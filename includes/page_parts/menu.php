<?php

/**
 * This file contains the menu items, including the visual- and rights checks
 */

$visual = $visuals->get();

if ($visual['home'] == 1) {
    menuitem('Home', 'index.php');
}

if ($visual['tips'] == 1) {
    menuitem('Tips', 'index.php?page=1');
}

if ($visual['tools'] == 1) {
    menuitem('Tools', 'index.php?page=2');
}

if ($visual['wiki'] == 1) {
    menuitem('Wiki', 'index.php?page=3');
}

if (isset($_SESSION['user']) && $_SESSION['user'] != NULL) {
    if ($visual['planning'] == 1) {
        menuitem('Planning', 'index.php?page=4');
    }
}

if (isset($_SESSION['user']) && $_SESSION['user'] != NULL) {
    $logs = array(
        array('Red Star Runs', 'index.php?page=5&sub=1'),
        array('White Stars', 'index.php?page=5&sub=1')
    );

    if ($visual['logs'] == 1) {
        menuitem('Logs', $logs, $menu_id);
    }
}

if (isset($_SESSION['user']) && $_SESSION['user'] != NULL) {

    $progress = array(
        array('Module progress', 'index.php?page=6&sub=1'),
        array('Ship progress', 'index.php?page=6&sub=2'),
        array('Planet progress', 'index.php?page=6&sub=3'),
        array('Other progress', 'index.php?page=6&sub=4')
    );

    if ($visual['progress'] == 1) {
        menuitem('Progress', $progress, $menu_id);
    }
}

if (isset($_SESSION['user']) && $_SESSION['user'] != NULL) {
    $settings = array();

    if ($rights->get('perm_artifacts')) {
        array_push($settings, array('Artifacts','index.php?page=7&sub=1'));
    }

    if ($rights->get('perm_cerberus')) {
        array_push($settings, array('Cerberus', 'index.php?page=7&sub=2'));
    }

    if ($rights->get('perm_home')) {
        array_push($settings, array('Home', 'index.php?page=7&sub=3'));
    }

    if ($rights->get('perm_modules')) {
        array_push($settings, array('Modules', 'index.php?page=7&sub=4'));
    }

    if ($rights->get('perm_perms')) {
        array_push($settings, array('Permissions', 'index.php?page=7&sub=5'));
    }

    if ($rights->get('perm_planets')) {
        array_push($settings, array('Planets', 'index.php?page=7&sub=6'));
    }

    if($rights->get('perm_planning')) {
        array_push($settings, array('Planning', 'index.php?page=7&sub=7'));
    }

    if($rights->get('perm_progress')) {
        array_push($settings, array('Progress', 'index.php?page=7&sub=8'));
    }

    if($rights->get('perm_quickstats')) {
        array_push($settings, array('Quickstats', 'index.php?page=7&sub=9'));
    }

    if($rights->get('perm_rates')) {
        array_push($settings, array('Rates', 'index.php?page=7&sub=10'));
    }

    if($rights->get('perm_sheet')) {
        array_push($settings, array('Sheet', 'index.php?page=7&sub=11'));
    }

    if($rights->get('perm_ships')) {
        array_push($settings, array('Ships', 'index.php?page=7&sub=12'));
    }

    if($rights->get('perm_spacestations')) {
        array_push($settings, array('Spacestations', 'index.php?page=7&sub=13'));
    }

    if($rights->get('perm_tips')) {
        array_push($settings, array('Tips', 'index.php?page=7&sub=14'));
    }

    if($rights->get('perm_tools')) {
        array_push($settings, array('Tools', 'index.php?page=7&sub=15'));
    }

    if($rights->get('perm_users')) {
        array_push($settings, array('Users', 'index.php?page=7&sub=16'));
    }

    if($rights->get('perm_visuals')) {
        array_push($settings, array('Visuals', 'index.php?page=7&sub=17'));
    }

    if($rights->get('perm_white_star')) {
        array_push($settings, array('White Star Status', 'index.php?page=7&sub=18'));
    }

    menuitem('Settings', $settings, $menu_id);
}

if (isset($_SESSION['user']) && $_SESSION['user'] != NULL) {
    menuitem('Console', 'index.php?page=8');
}

if (isset($_SESSION['user']) && $_SESSION['user'] != NULL) {
    menuitem('Logout', 'index.php?logout=true');
} else {
    menuitem('Login', 'index.php?page=9');
}