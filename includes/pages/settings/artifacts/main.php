<?php

/**
 * This file navigates and includes the artifacts pages
 * Also the artifacts variables are set when available and needed
 */

$mainPath = 'includes/pages/settings/artifacts/';
$staticPath = 'includes/pages/settings/artifacts_statics/';
$variablePath = 'includes/pages/settings/artifacts_variables/';
$valuesPath = 'includes/pages/settings/artifacts_values/';

$artifact = isset($_GET['artifacts_id']) ? $artifacts->get($_GET['artifacts_id']) : NULL;
$artifacts_static = isset($_GET['artifacts_statics_id']) ? $artifacts_statics->get($_GET['artifacts_id']) : NULL;
$artifacts_variable = isset($_GET['artifacts_variables_id']) ? $artifacts_variables->get($_GET['artifacts_variables_id']) : NULL;

if (isset($_GET['action']) && $_GET['action'] != NULL) {
    switch($_GET['action']) {
        case '1':
            include($mainPath.'add.php');
            break;
        case '2':
            include($mainPath.'edit.php');
            break;
        case '3':
            include($mainPath.'delete.php');
            break;
        case '4':
            include($staticPath.'all.php');
            break;
        case '5':
            include($staticPath.'add.php');
            break;
        case '6':
            include($staticPath.'edit.php');
            break;
        case '7':
            include($staticPath.'delete.php');
            break;
        case '8':
            include($variablePath.'all.php');
            break;
        case '9':
            include($variablePath.'add.php');
            break;
        case '10':
            include($variablePath.'edit.php');
            break;
        case '11':
            include($variablePath.'delete.php');
            break;
        case '12':
            include($valuesPath.'add.php');
            break;
        default:
            include($mainPath.'all.php');
            break;
    }
} else {
    include($mainPath.'all.php');
}