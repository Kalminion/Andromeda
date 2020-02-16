<?php

// Database connection
require_once('../includes/classes/Andromeda/Classes/Db.php');
require_once('../includes/connections/config.php');

use Andromeda\Classes as Base;
$db = new Base\Db($db_name, $db_host, $db_username, $db_password);

// Handling
$headers = getallheaders();

$table = $headers['target'];
$rows = null;
$column = null;
$selector = null;

if (isset($headers['select'])) {
    $rows = $headers['select'];
}
if (isset($headers['column'])) {
    $column = $headers['column'];
}
if (isset($headers['selector'])) {
    $selector = $headers['selector'];
}

$acceptedTable = array(
    'artifacts',
    'artifacts_statics',
    'artifacts_values',
    'artifacts_variables',
    'cerberus',
    'cerberus_statics',
    'home',
    'modules',
    'modules_statics',
    'modules_types',
    'modules_values',
    'modules_variables',
    'permissions',
    'planets',
    'planets_statics',
    'planets_values',
    'planets_variables',
    'progress',
    'quickstats_calculations',
    'quickstats_modules',
    'rates_base',
    'rates_exceptions',
    'rates_trades',
    'red_star_queue',
    'red_star_runs',
    'red_star_statusses',
    'roles',
    'roles_modules',
    'ships',
    'ships_values',
    'ships_variables',
    'spacestations',
    'spacestations_statics',
    'spacestations_values',
    'spacestations_variables',
    'tips',
    'tools',
    'users',
    'visuals',
    'white_star',
    'white_star_status'
);

if (in_array($table, $acceptedTable)) {
    switch($rows) {
        case 'all':
            $return = $db->all('SELECT * FROM `'.$table.'` WHERE `deleted_by` IS NULL');
            break;
        case 'count':
            $return = $db->one('SELECT COUNT(*) FROM `'.$table.'` WHERE `deleted_by` IS NULL');
            break;
        case 'get':
            $return = $db->row('SELECT * FROM `'.$table.'` WHERE `'.$column.'` = ? AND `deleted_by` IS NULL', array($selector));
            break;
        default:
            $return = 'Variable "$rows" not set';
    }
}

// Returning
header('Content-Type: application/json');
if (isset($return) && $return != null) {
    if (is_array($return)) {
        echo json_encode($return);
    } else {
        echo json_encode(array($return));
    }
} else {
    echo json_encode(array('server error!'));
}