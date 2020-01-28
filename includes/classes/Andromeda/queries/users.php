<?php

namespace Andromeda\Queries;

use Andromeda\classes\Db;

class Users {

    private $db = null;

    public function __construct($db)
    {
        $this->db = $db;
    }

    /**
     * 
     * Counts all users
     * @return int
     * 
     */

    public function count()
    {
        return $this->db->one('SELECT COUNT(*) FROM `users` WHERE `deleted_by` IS NULL');
    }

    /**
     * 
     * Get all users
     * @return array
     * 
     */

    public function all()
    {
        return $db->all('SELECT *  FROM `users` WHERE `deleted_by` IS NULL ORDER BY `name` ASC');
    }

    /**
     * 
     * Get user from it's username
     * @param string    $name       The username from the user
     * @return array
     * 
     */

    public function fromName($name)
    {
        return $this->db->row('SELECT * FROM `users` WHERE `name` = ? AND `deleted_by` IS NULL', array($name));
    }

    /**
     * 
     * Get user by it's ID
     * @param int       $user_id    The user's ID
     * @return array
     * 
     */

    public function get($user_id)
    {
        return $this->db->row('SELECT * FROM `users` WHERE `id` = ? AND `deleted_by` IS NULL',array($user_id));
    }

    /**
     * 
     * Delete user by it's ID
     * @param int       $user_id    The user's ID
     * 
     */

    public function delete($user_id)
    {
        $this->db->none('UPDATE `users` SET `deleted_by` = ?, `deleted_on` = ? WHERE `id` = ?', array($_SESSION['user_id'], date('Y-m-d H:i:s'), $user_id));
    }

    /**
     * 
     * Add user when form is sent
     * Generate random password for the user
     * 
     * @param string    $name               The name of the user
     * @param int       $discord_id         The discord ID of the user
     * @param int       $permission         The permission ID of the user
     * 
     */

    public function add($name, $discord_id, $permission_id)
    {
        $pass = substr(md5('KLM/FlyingDutchmen'.rand(1,99999).date('s-v-u')), 4, 10); // This is going to be changed in the future, to a seperate function
        $this->db->none('INSERT INTO `users` (`name`, `discord_id`, `password`, `permissions_id`, `added_by`, `added_on`) VALUES (?, ?, ?, ?, ?, ?)', array($name, $discord_id, $pass, $permission_id, $_SESSION['user_id'], date('Y-m-d H:i:s')));
    }

    /**
     * 
     * Edit user when form is sent
     * @param string        $name           The name of the user
     * @param int           $discord_id     The discord ID of the user
     * @param int           $permission     The permission ID of the user
     * @param int           $id             The user ID to edit
     * 
     */

    public function edit($id, $name, $discord_id, $permission_id)
    {
        $this->db->none('UPDATE `users` SET `name` = ?, `discord_id` = ?, `permissions_id` = ?, `editted_by` = ?, `editted_on` = ? WHERE `id` = ?', array($name, $discord_id, $permission_id, $_SESSION['user_id'], date('Y-m-d H:i:s'), $id));
    }

    /**
     * 
     * Log user in when form is sent
     * @param string    $name               The usernamae
     * @param string    $password           The users' password
     * 
     */

    public function login($name, $password)
    {
        // Get user from database
        $user = fromName($name);
    
        if (!$user || $user == NULL) {
            echo 'No user found';
        } else {
            if ($password == $user['password']) {
                $_SESSION['user'] = $user['id'];
            }
        }
    }
}