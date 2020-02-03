<?php

$path = 'includes/pages/settings/modules/';

if (isset($_GET['action']) && $_GET['action'] != NULL) {
    switch($_GET['action']) {
        case '1':
            include($path.'add.php');
            break;
        case '2':
            include($path.'edit.php');
            break;
        default;
            include($path.'all.php');
            break;
    }
} else {
    include($path.'all.php');
}