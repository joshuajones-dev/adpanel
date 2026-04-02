<?php

class Users extends Controller
{
    public function index()
    {
        $model = $this->model('UsersModel');
        $ous = $model->getAllOUs();

        $selectedOu = $_GET['ou'] ?? null;
        $users = $model->getAllUsers($selectedOu);

        $data['created_user_dn'] = $_GET['created'] ?? null;

        $data['page'] = 'users';
        $data['subpage'] = 'list';
        $data['page_title'] = 'User List';
        $data['ous'] = $ous;
        $data['selected_ou'] = $selectedOu;
        $data['users'] = $users;

        $data['css'] = ['vendor/datatables/media/css/dataTables.bootstrap5.css']; // to add more, use this → , 'custom-chart.js']; ←  Root is ASSETS, so make sure to use css folder or vendor
        $data['scripts'] = ['vendor/datatables/media/js/jquery.dataTables.min.js', 'vendor/datatables/media/js/dataTables.bootstrap5.min.js', 'js/pages/users-list.js']; // ←  Root is ASSETS, so make sure to use js folder or vendor

        $this->render('users/list', $data);
    }

    public function test()
    {
        die('This is just a test page!');
        $model = $this->model('UsersModel');
        $ous = $model->getAllOUs();

        echo '<pre>';
        foreach ($ous as $ou) {
            echo $ou->getDn() . PHP_EOL;
        }
        echo '</pre>';
        exit;
        $this->render('users/test', $data);
    }

    public function raw()
    {
        $host = LDAP_CONFIG['hosts'][0];
        $bindUser = LDAP_CONFIG['username'];
        $bindPass = LDAP_CONFIG['password'];
        $baseDn = LDAP_CONFIG['base_dn'];

        $conn = ldap_connect($host);
        ldap_set_option($conn, LDAP_OPT_PROTOCOL_VERSION, 3);
        ldap_set_option($conn, LDAP_OPT_REFERRALS, 0);

        if (!@ldap_bind($conn, $bindUser, $bindPass)) {
            die("Failed to bind to LDAP server.");
        }

        $dn = "CN=RawTestUser,CN=Users," . $baseDn;

        $entry = [
            'cn' => 'RawTestUser',
            'givenName' => 'Raw',
            'sn' => 'Test',
            'sAMAccountName' => 'raw.test',
            'userPrincipalName' => 'raw.test@dc1.local', // <-- Manual hard-coded domain suffix
            'objectClass' => ['top', 'person', 'organizationalPerson', 'user']
        ];

        $result = @ldap_add($conn, $dn, $entry);

        if ($result) {
            echo "✅ Raw user created successfully: $dn";
        } else {
            echo "❌ Failed to create raw user: " . ldap_error($conn);
        }

        ldap_unbind($conn);
    }

    public function testpass()
    {
        $userDn = "CN=Test Employee,OU=Users,OU=Company,DC=dc1,DC=local";
        $newPassword = '"Test123!"'; // Note: must be in double quotes per AD rules

        $conn = ldap_connect('ldap://192.168.0.10', 389);
        ldap_set_option($conn, LDAP_OPT_PROTOCOL_VERSION, 3);
        ldap_set_option($conn, LDAP_OPT_REFERRALS, 0);

        if (@ldap_bind($conn, 'Administrator@dc1.local', '')) {
            $encodedPass = mb_convert_encoding($newPassword, "UTF-16LE");
            $entry = ['unicodePwd' => $encodedPass];

            if (@ldap_mod_replace($conn, $userDn, $entry)) {
                echo "✅ Password reset successful.";
            } else {
                echo "❌ Password reset failed: " . ldap_error($conn);
            }

            ldap_unbind($conn);
        } else {
            echo "❌ Bind failed: " . ldap_error($conn);
        }

    }

    public function testadd()
    {
        $model = $this->model('UsersModel');

        $data['page'] = 'users';
        $data['subpage'] = 'add';
        $data['page_title'] = 'Test Add User';
        $data['error'] = null;
        $data['success'] = null;
        $data['all_users'] = $model->getAllUserDNs()->sortBy(function ($u) {
            return strtolower($u->getFirstAttribute('cn'));
        })->values(); // reset numeric keys

        $data['all_ous'] = $model->getAllOUs()->sortBy(function ($ou) {
            return strtolower($ou->getFirstAttribute('ou') ?? $ou->getFirstAttribute('name') ?? $ou->getDn());
        })->values();

        $data['all_groups'] = $model->getAllGroupDNs()->sortBy(function ($g) {
            return strtolower($g->getFirstAttribute('cn'));
        })->values();
        $data['css'] = ['vendor/codemirror/theme/monokai.css', 'vendor/boxicons/css/boxicons.min.css', 'vendor/bootstrap-tagsinput/bootstrap-tagsinput.css'];
        $data['scripts'] = ['vendor/jquery-validation/jquery.validate.js', 'js/global-form-behaviors.js', 'vendor/ios7-switch/ios7-switch.js', 'js/pages/users-add-enhanced.js', 'vendor/bootstrap-maxlength/bootstrap-maxlength.js', 'vendor/jquery-maskedinput/jquery.maskedinput.js', 'js/examples/examples.advanced.form.js', 'js/examples/examples.ecommerce.form.js']; // ←  Root is ASSETS, so make sure to use js folder or vendor

        $this->render('users/testadd', $data);
    }

    public function add()
    {
        $model = $this->model('UsersModel');

        $data['page'] = 'users';
        $data['subpage'] = 'add';
        $data['page_title'] = 'Add User';
        $data['error'] = null;
        $data['success'] = null;
        $data['all_users'] = $model->getAllUserDNs()->sortBy(function ($u) {
            return strtolower($u->getFirstAttribute('cn'));
        })->values(); // reset numeric keys

        $data['all_ous'] = $model->getAllOUs()->sortBy(function ($ou) {
            return strtolower($ou->getFirstAttribute('ou') ?? $ou->getFirstAttribute('name') ?? $ou->getDn());
        })->values();

        $data['all_groups'] = $model->getAllGroupDNs()->sortBy(function ($g) {
            return strtolower($g->getFirstAttribute('cn'));
        })->values();
        $data['css'] = ['vendor/bootstrap-multiselect/css/bootstrap-multiselect.css', 'vendor/bootstrap-tagsinput/bootstrap-tagsinput.css'];
        $data['scripts'] = ['js/global-form-behaviors.js', 'js/pages/users-add-enhanced.js', 'js/examples/examples.advanced.form.js']; // ←  Root is ASSETS, so make sure to use js folder or vendor

        $data['form'] = $_POST;
        unset($data['form']['password']);
        unset($data['form']['confirm_password']);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $validationErrors = $model->validateUserInput($_POST);
            if (!empty($validationErrors)) {
                $data['error'] = implode('<br>', $validationErrors);
                return $this->render('users/add', $data);
            }

            $conflicts = $model->checkUserUniqueness($_POST);
            if (!empty($conflicts)) {
                $data['error'] = implode('<br>', $conflicts);
                return $this->render('users/add', $data);
            }

            $result = $model->addUser($_POST);

            if ($result === true) {
                $redirectDn = urlencode($result); // `$result` will be the new user DN
                header("Location: " . ROOT . "users?created=$redirectDn");
                exit;
            } else {
                $data['error'] = is_string($result) ? $result : 'User creation failed.';
            }
        }

         $this->render('users/add', $data);
        //$this->view('users/addnew', $data);
    }

    // ... and so on for edit/delete
}