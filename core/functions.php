<?php

function isActive($page, $sub = null)
{
    global $data;
    if (!isset($data['page'])) return false;

    if ($data['page'] === $page) {
        if ($sub === null) return true;
        return isset($data['subpage']) && $data['subpage'] === $sub;
    }

    return false;
}

function show($stuff)
{
    echo "<pre>";
    print_r($stuff);
    echo "</pre>";
}

function fieldClass($fieldName, $data)
{
    if (!isset($data['form'][$fieldName])) return '';
    return isset($data['field_errors'][$fieldName]) ? 'is-invalid' : 'is-valid';
}

function fieldValue($fieldName, $data)
{
    return htmlspecialchars($data['form'][$fieldName] ?? '');
}

function fieldError($fieldName, $data)
{
    if (isset($data['field_errors'][$fieldName])) {
        return '<div class="invalid-feedback">This field is required or invalid.</div>';
    }
    return '';
}

function escapeLdapDnValue($value)
{
    if (function_exists('ldap_escape')) {
        return ldap_escape($value, '', LDAP_ESCAPE_DN);
    }

    // Fallback if ldap_escape is not enabled
    return addcslashes($value, ',=+<>#;\"\\');
}

function escapeLdapCnValue($value)
{
    if (function_exists('ldap_escape')) {
        return ldap_escape($value, '', LDAP_ESCAPE_DN);
    }
    return addcslashes($value, ',=+<>#;\"\'' . chr(0));
}

function escapeLdapOuValue($value)
{
    $parts = explode(',', $value);
    $escapedParts = [];

    foreach ($parts as $part) {
        if (stripos($part, 'OU=') === 0) {
            $ouName = substr($part, 3); // Remove "OU="
            $ouName = ldap_escape(trim($ouName), '', LDAP_ESCAPE_DN); // Safe escape
            $escapedParts[] = 'OU=' . $ouName;
        } elseif (stripos($part, 'DC=') === 0) {
            $escapedParts[] = trim($part);
        } else {
            $escapedParts[] = trim($part); // Safety net
        }
    }

    return implode(',', $escapedParts);
}

function validateSamAccountName($username)
{
    if (empty($username)) {
        return "Username (sAMAccountName) is required.";
    }

    if (strlen($username) > 20) {
        return "Username must be 20 characters or fewer.";
    }

    if (!preg_match('/^[a-zA-Z0-9._-]+$/', $username)) {
        return "Username can only contain letters, numbers, periods, underscores, and hyphens.";
    }

    return true;
}

function adpanel_log($message, $type = 'info')
{
    $logFile = __DIR__ . '/../app/logs/adpanel.log'; // Adjusted path
    $timestamp = date('Y-m-d H:i:s');
    $line = "[$timestamp] [$type] $message" . PHP_EOL;
    file_put_contents($logFile, $line, FILE_APPEND);
}
