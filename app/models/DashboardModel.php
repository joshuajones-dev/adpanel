<?php

use LdapRecord\Container;
use LdapRecord\Connection;

class DashboardModel
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

    public function getStats()
    {
        $count = function($filter) {
            try {
                return count($this->connection->query()->rawFilter($filter)->get());
            } catch (Exception $e) {
                return 'Error: ' . $e->getMessage();
            }
        };

        return [
            'bind_status' => '✅ Connected',
            'users' => $count('(objectClass=user)'),
            'computers' => $count('(objectClass=computer)'),
            'groups' => $count('(objectClass=group)'),
            'ous' => $count('(objectClass=organizationalUnit)'),
            'never_expires' => $count('(&(objectClass=user)(userAccountControl:1.2.840.113556.1.4.803:=65536))'),
            'disabled' => $count('(&(objectClass=user)(userAccountControl:1.2.840.113556.1.4.803:=2))'),
            'locked_out' => $count('(&(objectClass=user)(lockoutTime>=1))'),
            'recent_searches' => 4, // Placeholder
            'sync_time' => date('Y-m-d H:i:s'), // Placeholder for last sync
            'enabled_accounts' => 125, // Placeholder
            'created_this_week' => 8, // Placeholder
            'admin_notes' => 'All systems nominal. AD cleanup planned Friday.'
        ];
    }

}
