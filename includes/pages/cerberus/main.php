<?php

/**
 * This file navigates and includes the cerberus pages
 * Also the cerberus variables are set when available and needed
 */

$cerberus = isset($_GET['cerberus_id']) ? $cerberus->get($_GET['cerberus_id']) : NULL;
$cerberus_static = isset($_GET['cerberus_statics_id']) ? $cerberus_statics->get($_GET['cerberus_id']) : NULL;

if (isset($_GET['action']) && $_GET['action'] != NULL) {
    switch($_GET['action']) {
        case '1':
            include('includes/pages/cerberus/add.php');
            break;
        default:
            include('includes/pages/cerberus/all.php');
            break;
    }
} else {
    include('includes/pages/cerberus/all.php');
}