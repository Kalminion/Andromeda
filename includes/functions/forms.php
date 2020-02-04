<?php

/**
 * This file contains the form handling when a form is sent
 */

if (isset($_POST['form']) && $_POST['form'] != NULL) {
    switch($_POST['form']) {
        case 'login':
            $users->login($_POST['name'], $_POST['password']);
            break;
        case 'artifacts_add':
            artifacts_add($_POST['name'], $_POST['description'], $_POST['image']);
            break;
        case 'artifacts_edit':
            artifacts_edit($_POST['id'], $_POST['name'], $_POST['description'], $_POST['image']);
            break;
        case 'artifacts_statics_add':
            artifacts_statics_add($_POST['artifact'], $_POST['name'], $_POST['value']); 
            break;
        case 'artifacts_statics_edit':
            artifacts_statics_edit($_POST['static'], $_POST['name'], $_POST['value']);
            break;
        case 'artifacts_variables_add':
            artifacts_variables_add($_POST['name'], $_POST['artifact']);
            break;
        case 'artifacts_variables_edit':
            artifacts_variables_edit($_POST['variable'], $_POST['name']);
            break;
    }
}