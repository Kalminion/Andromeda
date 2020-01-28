<?php

namespace Andromeda\Classes;

use Andromeda\Classes\Db;
use Andromeda\Queries\Permissions;
use Andromeda\Queries\Users;

class Rights
{

    private $db = null;
    private $permissions = null;

    public function __construct($db)
    {
        $this->db = $db;
        
        $user = $this->db->row('SELECT * FROM `users` WHERE `id` = ?', array($_SESSION['user']));
        $this->permissions = $this->db->row('SELECT * FROM `permissions` WHERE `id` = ?', array($user['permissions_id']));
    }

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

    public function get($permission)
    {
        if ($this->permissions[$permission] == 1) {
            return true;
        }

        return false;
    }
}