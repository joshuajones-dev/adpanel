<?php

ini_set('log_errors', 1);

use LdapRecord\Container;
use LdapRecord\Connection;
use LdapRecord\Models\ActiveDirectory\User;
use LdapRecord\Models\Entry;
use LdapRecord\Models\Attributes\DistinguishedName;
//use LdapRecord\Models\ActiveDirectory\Entry;

class UsersModel
{
    public $connection;

    public function __construct()
    {
        $this->connection = new Connection(LDAP_CONFIG);

        try {
            $this->connection->connect();
            Container::addConnection($this->connection);
        } catch (\LdapRecord\Auth\BindException $e) {
            return null;
        }
    }

    public function getAvailableDomains()
    {
        $connection = new Connection(LDAP_CONFIG);

        $results = $connection->query()
            ->in('CN=Partitions,CN=Configuration,' . LDAP_CONFIG['base_dn'])
            ->where('objectClass', '=', 'crossRef')
            ->select(['nCName', 'dnsRoot'])
            ->get();

        $domains = [];

        foreach ($results as $result) {
            $domains[] = $result->getFirstAttribute('dnsRoot');
        }

        return array_filter($domains); // Remove empty ones
    }

    public function getAllUsers($ou = null)
    {
        try {
            $query = User::query()
                ->select(['displayName', 'cn', 'userPrincipalName', 'title', 'department', 'manager', 'distinguishedName'])
                ->where('objectClass', '=', 'user');

            if ($ou) {
                $query->in($ou); // Sets base DN for the query
            }

            return $query->get();
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function getAllOUs()
    {
        try {
            return Entry::query()
                ->in(LDAP_CONFIG['base_dn'])
                ->where('objectClass', '=', 'organizationalUnit')
                ->recursive()
                ->get();
        } catch (Exception $e) {
            return collect(); // Safe empty return
        }
    }

    public function getAllUserDNs()
    {
        try {
            return User::query()
                ->select(['cn', 'distinguishedName'])
                ->get();
        } catch (Exception $e) {
            return collect();
        }
    }

    public function getAllGroupDNs()
    {
        try {
            return \LdapRecord\Models\ActiveDirectory\Group::query()
                ->select(['cn', 'distinguishedName'])
                ->get();
        } catch (Exception $e) {
            return collect();
        }
    }

    public function validateUserInput($data)
    {
        $errors = [];

        $username = trim($data['username'] ?? '');
        $password = $data['password'] ?? '';
        $reservedUsernames = ['administrator', 'admin', 'guest', 'krbtgt'];
        $invalidCharsPattern = '/[^a-zA-Z0-9._-]/';

        // Username validations
        if (preg_match($invalidCharsPattern, $username)) {
            $errors[] = "Username contains invalid characters.";
        }

        if (in_array(strtolower($username), $reservedUsernames)) {
            $errors[] = "Username is reserved.";
        }

        // Password validations (future: config-driven)
        $minLength = 8; // future: make configurable
        $requireUpper = true;
        $requireLower = true; // always on
        $requireNumber = true;
        $requireSymbol = true;
        $approvedSymbols = '!@#$%^&*()-_=+[]{}';

        if (strlen($password) < $minLength) {
            $errors[] = "Password must be at least {$minLength} characters.";
        }

        if ($requireLower && !preg_match('/[a-z]/', $password)) {
            $errors[] = "Password must include at least one lowercase letter.";
        }

        if ($requireUpper && !preg_match('/[A-Z]/', $password)) {
            $errors[] = "Password must include at least one uppercase letter.";
        }

        if ($requireNumber && !preg_match('/\d/', $password)) {
            $errors[] = "Password must include at least one number.";
        }

        if ($requireSymbol && !preg_match('/[' . preg_quote($approvedSymbols, '/') . ']/', $password)) {
            $errors[] = "Password must include at least one approved symbol: " . htmlspecialchars($approvedSymbols);
        }

        if ($data['password'] !== $data['confirm_password']) {
            $errors[] = "Password and confirmation do not match.";
        }

        return $errors;
    }

    public function checkUserUniqueness($data)
    {
        $conflicts = [];

        $username = trim($data['username'] ?? '');
        $upn = "$username@dc1.local"; // match how you construct it in addUser()
        $email = trim($data['mail'] ?? '');

        if (User::where('sAMAccountName', '=', $username)->exists()) {
            $conflicts[] = "Username already exists.";
        }

        if ($email && User::where('mail', '=', $email)->exists()) {
            $conflicts[] = "Email address already in use.";
        }

        if (User::where('userPrincipalName', '=', $upn)->exists()) {
            $conflicts[] = "Logon name (UPN) already exists.";
        }

        return $conflicts;
    }

    public function addUser($data)
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return "Invalid request.";
        }

        try {
            $createResult = $this->createMinimalUser($data);
            if ($createResult !== true) {
                return $createResult; // Error message returned
            }

            // Optionally return DN here for redirect/highlight later
            $dn = $this->buildUserDn($data);
            return $dn;

        } catch (Exception $e) {
            return "Error creating user: " . $e->getMessage();
            adpanel_log("Error creating user: " . $e->getMessage());
        }
    }

    private function createMinimalUser($data)
    {
        try {
            $first = trim($data['givenName'] ?? '');
            $last = trim($data['sn'] ?? '');
            $username = trim($data['username'] ?? '');
            $password = $data['password'] ?? '';
            $ou = $data['user_ou'] ?? DEFAULT_USER_OU;
            $domain = $data['user_domain'] ?? DEFAULT_DOMAIN_SUFFIX;

            if (empty($first) || empty($last)) {
                return "First and Last name are required.";
            }

            $validUsername = validateSamAccountName($username);
            if ($validUsername !== true) {
                return $validUsername;
            }

            if (empty($password)) {
                return "Password is required.";
            }

            $cn = trim("$first $last");
            $escapedCn = escapeLdapCnValue($cn);
            $escapedOu = escapeLdapOuValue($ou);
            $dn = "CN={$escapedCn},{$escapedOu}";

            // Create user via raw LDAP
            $host = LDAP_CONFIG['hosts'][0];
            $bindUser = LDAP_CONFIG['username'];
            $bindPass = LDAP_CONFIG['password'];

            $conn = ldap_connect($host);
            ldap_set_option($conn, LDAP_OPT_PROTOCOL_VERSION, 3);
            ldap_set_option($conn, LDAP_OPT_REFERRALS, 0);

            if (!@ldap_bind($conn, $bindUser, $bindPass)) {
                return "Failed to bind to LDAP server.";
            }

            $entry = [
                'cn' => $cn,
                'givenName' => $first,
                'sn' => $last,
                'sAMAccountName' => $username,
                'userPrincipalName' => "$username@$domain",
                'objectClass' => ['top', 'person', 'organizationalPerson', 'user']
            ];

            if (!@ldap_add($conn, $dn, $entry)) {
                return "LDAP create failed: " . ldap_error($conn);
            }

            ldap_unbind($conn);

            // After successful create, set password & flags
            return $this->finalizeUser($dn, $password, $data);

        } catch (Exception $e) {
            return "Exception during user creation: " . $e->getMessage();
        }
    }

    private function finalizeUser($dn, $password, $data)
    {
        try {
            $user = \LdapRecord\Models\ActiveDirectory\User::query()->find($dn);

            if (!$user) {
                return "Could not find user after creation.";
            }

            $user->setPassword($password, 'unicodePwd');

            // Set flags cleanly using a new variable
            $flags = 512;

            if (!empty($data['pw_never_expires'])) {
                $flags |= 65536;
            }

            $user->userAccountControl = $flags;

            if (!empty($data['must_change_pw'])) {
                $user->pwdLastSet = 0;
            }

            $user->save();
            return true;

        } catch (\Exception $e) {
            return "Error finalizing user: " . $e->getMessage();
        }
    }

    private function createInitialAttributes($dn, $data)
    {
        try {
            $connection = Container::getDefaultConnection();
            $results = $connection->query()->where('distinguishedName', '=', $dn)->get();

            if (count($results) === 0) {
                return "User not found after creation.";
                adpanel_log("User not found after creation: $dn", 'error');
            }

            $rawUser = $results[0];

            // Flatten any remaining single-value arrays
            foreach ($rawUser as $key => $value) {
                if (is_array($value) && count($value) === 1) {
                    $rawUser[$key] = $value[0];
                }
            }

            //adpanel_log(print_r($rawUser, true));

            // Remove both DN-related attributes
            unset($rawUser['dn'], $rawUser['distinguishedName']);

            // Now cast to User
            $user = new User($rawUser);
            $user->setDn($dn);

            // Set extra fields
            $user->mail = $data['mail'] ?? null;
            $user->description = $data['description'] ?? null;
            $user->title = $data['title'] ?? null;
            $user->department = $data['department'] ?? null;
            $user->company = $data['company'] ?? null;
            $user->manager = $data['manager'] ?? null;

            // Group membership
            $groups = $data['groups'] ?? [];
            $domainUsersDn = 'CN=Domain Users,CN=Users,DC=adtest,DC=local';
            if (!in_array($domainUsersDn, $groups)) {
                $groups[] = $domainUsersDn;
            }

            foreach ($groups as $groupDn) {
                try {
                    $group = \LdapRecord\Models\ActiveDirectory\Group::find($groupDn);
                    if ($group) {
                        $group->members()->attach($user);
                    }
                } catch (Exception $e) {
                    // Optional: log
                }
            }

            // Flags + Password
            if (!empty($data['password'])) {
                try {
                    $user->setPassword($data['password']);
                } catch (\Exception $e) {
                    return "Password error: " . $e->getMessage();
                }
            }

            // Enable the account (default)
            $user->userAccountControl = 512;
            if (!empty($data['must_change_pw'])) {
                $user->pwdLastSet = 0;
            }
            if (!empty($data['pw_never_expires'])) {
                $user->userAccountControl |= 65536;
            }

            $user->save();

            return true;

        } catch (Exception $e) {
            return "Error updating initial attributes: " . $e->getMessage();
        }
    }

    private function checkUserExists($dn)
    {
        try {
            $user = User::find($dn);
            return $user !== null;
        } catch (Exception $e) {
            return false;
        }
    }

    private function buildUserDn($data)
    {
        $first = trim($data['givenName'] ?? '');
        $last = trim($data['sn'] ?? '');
        $cn = trim("$first $last");
        $escapedCn = escapeLdapCnValue($cn);
        $userOu = $data['user_ou'] ?? DEFAULT_USER_OU;
        $escapedUserOu = escapeLdapOuValue($userOu);

        return "CN={$escapedCn},{$escapedUserOu}";
    }


}