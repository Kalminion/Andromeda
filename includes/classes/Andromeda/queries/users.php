<?php

    /**
     * 
     * Counts all users
     * @return int
     * 
     */

    function users_count($db) {
        return $db->one('SELECT COUNT(*) FROM `users` WHERE `deleted_by` IS NULL');
    }

    /**
     * 
     * Get all users
     * @return array
     * 
     */

    function users_all($db) {
        return $db->all('SELECT *  FROM `users` WHERE `deleted_by` IS NULL ORDER BY `name` ASC');
    }

    /**
     * 
     * Get user from it's username
     * @param string    $name       The username from the user
     * @return array
     * 
     */

    function users_from_name($db, $name) {
        return $db->row('SELECT * FROM `users` WHERE `name` = ? AND `deleted_by` IS NULL', array($name));
    }

    /**
     * 
     * Get user by it's ID
     * @param int       $user_id    The user's ID
     * @return array
     * 
     */

    function users_get($db, $user_id) {
        return $db->row('SELECT * FROM `users` WHERE `id` = ? AND `deleted_by` IS NULL',array($user_id));
    }

    /**
     * 
     * Delete user by it's ID
     * @param int       $user_id    The user's ID
     * 
     */

    function users_delete($db, $user_id) {
        $db->none('UPDATE `users` SET `deleted_by` = ?, `deleted_on` = ? WHERE `id` = ?', array($_SESSION['user_id'], date('Y-m-d H:i:s'), $user_id));
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

    function users_add($db, $name, $discord_id, $permission_id) {
        $pass = substr(md5('KLM/FlyingDutchmen'.rand(1,99999).date('s-v-u')), 4, 10);
        $db->none('INSERT INTO `users` (`name`, `discord_id`, `password`, `permissions_id`, `added_by`, `added_on`) VALUES (?, ?, ?, ?, ?, ?)', array($name, $discord_id, $pass, $permission_id, $_SESSION['user_id'], date('Y-m-d H:i:s')));
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

    function users_edit($db, $id, $name, $discord_id, $permission_id) {
        $db->none('UPDATE `users` SET `name` = ?, `discord_id` = ?, `permissions_id` = ?, `editted_by` = ?, `editted_on` = ? WHERE `id` = ?', array($name, $discord_id, $permission_id, $_SESSION['user_id'], date('Y-m-d H:i:s'), $id));
    }

    /**
     * 
     * Log user in when form is sent
     * @param string    $name               The usernamae
     * @param string    $password           The users' password
     * 
     */

    function login($db, $name, $password) {

        // Get user from database
        $user = users_from_name($db, $name);
    
        if (!$user || $user == NULL) {
            echo 'No user found';
        } else {
            if ($password == $user['password']) {
                $_SESSION['user'] = $user['id'];
            }
        }
    }
?>