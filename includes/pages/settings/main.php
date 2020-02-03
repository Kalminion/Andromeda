<?php

/**
 * This file contains the settings page navigation
 */

if (isset($_GET['sub']) && $_GET['sub'] != NULL) {
    
    switch($_GET['sub']) {
        case '1':
            include('includes/pages/settings/artifacts/main.php');
            break;
        case '2':
            include('includes/pages/settings/cerberus/main.php');
            break;
        case '3':
            // Home
            break;
        case '4':
            // Modules
            include('includes/pages/settings/modules/main.php');
            break;
        case '5':
            // Permissions
            break;
        case '6':
            // Planets
            break;
        case '7':
            // Planning
            break;
        case '8':
            // Progress
            break;
        case '9':
            // Quickstats
            break;
        case '10':
            // Rates
            break;
        case '11':
            // Sheet
            break;
        case '12':
            // Ships
            break;
        case '13':
            // Spacestations
            break;
        case '14':
            // Tips
            break;
        case '15':
            // Tools
            break;
        case '16':
            // Users
            break;
        case '17':
            // White Star Status
            break;
    }
}