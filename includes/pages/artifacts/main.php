<?php

/**
 * This file navigates and includes the artifacts pages
 * Also the artifacts variables are set when available and needed
 */

$artifact = isset($_GET['artifacts_id']) ? $artifacts->get($_GET['artifacts_id']) : NULL;
$artifacts_static = isset($_GET['artifacts_statics_id']) ? $artifacts_statics->get($_GET['artifacts_id']) : NULL;
$artifacts_variable = isset($_GET['artifacts_variables_id']) ? $artifacts_variables->get($_GET['artifacts_variables_id']) : NULL;

if (isset($_GET['action']) && $_GET['action'] != NULL) {
    switch($_GET['action']) {
        case '1':
            include('includes/pages/artifacts/add.php');
            break;
        case '2':
            include('includes/pages/artifacts/edit.php');
            break;
        case '3':
            include('includes/pages/artifacts/delete.php');
            break;
        case '4':
            include('includes/pages/artifacts_statics/all.php');
            break;
        case '5':
            include('includes/pages/artifacts_statics/add.php');
            break;
        case '6':
            include('includes/pages/artifacts_statics/edit.php');
            break;
        case '7':
            include('includes/pages/artifacts_statics/delete.php');
            break;
        case '8':
            include('includes/pages/artifacts_variables/all.php');
            break;
        case '9':
            include('includes/pages/artifacts_variables/add.php');
            break;
        case '10':
            include('includes/pages/artifacts_variables/edit.php');
            break;
        case '11':
            include('includes/pages/artifacts_variables/delete.php');
            break;
        case '12':
            include('includes/pages/artifacts_values/add.php');
            break;
        default:
            include('includes/pages/artifacts/all.php');
            break;
    }
} else {
    include('includes/pages/artifacts/all.php');
}