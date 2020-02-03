<?php

/**
 * This file navigates and includes the cerberus pages
 * Also the cerberus variables are set when available and needed
 */

$mainPath = 'includes/pages/settings/cerberus/';
$staticPath = 'includes/pages/settings/cerberus_statics/';
/*
$cerberus = isset($_GET['cerberus_id']) ? $cerberus->get($_GET['cerberus_id']) : NULL;
$cerberus_static = isset($_GET['cerberus_statics_id']) ? $cerberus_statics->get($_GET['cerberus_id']) : NULL;
*/
if (isset($_GET['action']) && $_GET['action'] != NULL) {
    switch($_GET['action']) {
        case '1':
            include($mainPath.'add.php');
            break;
        case '2':
            include($mainPath.'edit.php');
            break;
        default:
            include($mainPath.'all.php');
            break;
    }
} else {
    include($mainPath.'all.php');
}