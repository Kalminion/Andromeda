<?php

/**
 *
 * This function is used for checking the permissions of the user
 * Check if the user_id session exists (user is logged in)
 * Get all information from the user, which includes the permission id (role)
 * Get all permissions from that id
 * Check for the requested permission
 * Return TRUE if requested permission is set to 1 in the database, otherwise return false
 *
 * @param string $permission         The name of the permission the user should have to continue
 *                                   These permission names are found in the database
 *                                   They should be the same as the column names in the permssion table
 *
 * @return boolean
 *
 */

function rights($db, $permission)
{
    if (isset($_SESSION['user']) && $_SESSION['user'] != NULL) {

        $user = users_get($db, $_SESSION['user']);
        $permissions = permissions_get($db, $user['permissions_id']);

        if ($permissions[$permission] == 1) {
            return true;
        }
    }

    return false;
}