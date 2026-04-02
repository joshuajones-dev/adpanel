<?php

define('WEBSITE_TITLE', " | AD Panel");

define('ONLINE', true);

define('LDAP_CONFIG', [
    'hosts' => ['192.168.0.10'],
    'use_ssl' => false,  // <-- FORCE SSL
    'use_tls' => false, // <-- Don't confuse with StartTLS
    'port' => 389,      // <-- Standard LDAPS port is 389, Secure is 636
    'base_dn' => 'dc=dc1,dc=local',
    'username' => '', // <-- Administrative user UPN
    'password' => '', // <-- Administrative user password
]);

define('LICENSE_KEY', 'DEMO1-23456-789AB-C1234'); // placeholder

// Feature Toggles
define('ADMIN_CAN_OVERRIDE_DISPLAY_NAME', true); // Set to false to disable override checkbox
define('PROTECTED_AD_ACCOUNTS', ['Administrator', 'Admin', 'Guest', 'krbtgt']);

define('DEFAULT_AD_GROUPS', [
    'CN=Users,CN=Builtin,' . LDAP_CONFIG['base_dn']
]);

define('DEFAULT_USER_OU', 'OU=Put Users Here' . LDAP_CONFIG['base_dn']);
define('LOCK_USER_OU', false); // Set to true to lock it to one, false if you want it selectable

define('AVAILABLE_DOMAINS', [
    'dc1.local', // Main domain
    'dc2.local',  // Additional trusted domain
    'company.com',  // Additional trusted domain
]);

define('DEFAULT_DOMAIN_SUFFIX', 'dc1.local');

define('SMTP_PRIMARY_EMAIL', 'ADPanel@company.com');
define('SMTP_PRIMARY_PASSWORD', 'MAKE NEW');

/* Automatically detect protocol */
$protocol = (!empty($_SERVER['HTTPS']) || (isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == 443)) ? 'https' : 'http';
define('PROTOCOL', $protocol);

/* Set project folder name here */
$projectFolder = '/adpanel';

/* Define base ROOT and ASSETS URLs */
define('ROOT', PROTOCOL . '://' . $_SERVER['SERVER_NAME'] . $projectFolder . '/');
define('ASSETS', ROOT . 'public/assets/');

define('APP_NAME', "AD Panel");
define('APP_DESC', "Web-based panel for working with Active Directory or other LDAP servers.");

/* Debug toggle */
define('DEBUG', true);
ini_set("display_errors", DEBUG ? 1 : 0);