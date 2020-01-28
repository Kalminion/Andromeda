<?php

namespace Andromeda\Queries;

use Andromeda\classes\Db;

class Permissions
{

    private $db = null;

    public function __construct($db)
    {
        $this->db = $db;
    }

    /**
     * 
     * Get all permissions
     * @return array
     * 
     */

    public function all()
    {
        return $this->db->all('SELECT * FROM `permissions` WHERE `deleted_by` IS NULL ORDER BY `name` ASC');
    }

    /**
     * 
     * Count all permissions
     * @return int
     * 
     */

    public function count()
    {
        return $this->db->one('SELECT COUNT(*) FROM `permissions` WHERE `deleted_by` IS NULL');
    }

    /**
     * 
     * Get permission by it's ID
     * @param int       $perm_id    The permission ID
     * @return array
     * 
     */

    public function get($perm_id)
    {
        return $this->db->row('SELECT * FROM `permissions` WHERE `id` = ? AND `deleted_by` IS NULL', array($perm_id));
    }

    /**
     * 
     * Delete permission by it's ID
     * @param int       $perm_id    The permission ID
     * 
     */

    public function delete($perm_id)
    { 
        $this->db->none('UPDATE `permissions` SET `deleted_by` = ?, `deleted_on` = ? WHERE `id` = ?', array($_SESSION['user_id'], date('Y-m-d H:i:s'), $perm_id));
    }

    /**
     * 
     * Add permission if form is sent
     * @param string        $name                    The name of the permission
     * @param int           $perm_artifact           The artifact permission setting
     * @param int           $perm_cerberus           The cerberus permission setting
     * @param int           $perm_home               The home permission setting
     * @param int           $perm_logs               The logs permission setting
     * @param int           $perm_modules            The modules permission setting
     * @param int           $perm_perms              The permissions permission setting
     * @param int           $perm_planets            The planets permission setting
     * @param int           $perm_planning           The planning permission setting
     * @param int           $perm_progress           The progress permission setting
     * @param int           $perm_quickstats         The quickstats permission setting
     * @param int           $perm_rates              The rates permission setting
     * @param int           $perm_roles              The roles permission setting
     * @param int           $perm_sheets             The sheets permission setting
     * @param int           $perm_ships              The ships permission setting
     * @param int           $perm_spacestations      The spacestation permission setting
     * @param int           $perm_tips               The tips permission setting
     * @param int           $perm_tools              The tools permission setting
     * @param int           $perm_usergroups         The usergroups permission setting
     * @param int           $perm_users              The users permission setting
     * @param int           $perm_visuals            The visuals permission setting
     * @param int           $perm_white_star         The white star permission setting
     * 
     */

    public function add($name, $perm_artifact, $perm_cerberus, $perm_home, $perm_logs, $perm_modules, $perm_perms, $perm_planets, $perm_planning, $perm_progress, $perm_quickstats, $perm_rates, $perm_roles, $perm_sheets, $perm_ships, $perm_spacestations, $perm_tips, $perm_tools, $perm_usergroups, $perm_users, $perm_visuals, $perm_white_star)
    {
        $perm_artifact = checkbox($perm_artifact);
        $perm_cerberus = checkbox($perm_cerberus);
        $perm_home = checkbox($perm_home);
        $perm_logs = checkbox($perm_logs);
        $perm_modules = checkbox($perm_modules);
        $perm_perms = checkbox($perm_perms);
        $perm_planets = checkbox($perm_planets);
        $perm_planning = checkbox($perm_planning);
        $perm_progress = checkbox($perm_progress);
        $perm_quickstats = checkbox($perm_quickstats);
        $perm_rates = checkbox($perm_rates);
        $perm_roles = checkbox($perm_roles);            
        $perm_sheets = checkbox($perm_sheets);
        $perm_ships = checkbox($perm_ships);            
        $perm_spacestations = checkbox($perm_spacestations);
        $perm_tips = checkbox($perm_tips);
        $perm_tools = checkbox($perm_tools);
        $perm_usergroups = checkbox($perm_usergroups);
        $perm_users = checkbox($perm_users);
        $perm_visuals = checkbox($perm_visuals);
        $perm_white_star = checkbox($perm_white_star);

        $this->db->none('INSERT INTO `permissions` (`name`, `perm_artifacts`, `perm_cerberus`, `perm_home`, `perm_logs`, `perm_modules`, `perm_perms`, `perm_planets`, `perm_planning`, `perm_progress`, `perm_quickstats`, `perm_rates`, `perm_roles`, `perm_sheet`, `perm_ships`, `perm_spacestations`, `perm_tips`, `perm_tools`, `perm_usergroups`, `perm_users`, `perm__visuals`, `perm_white_star`, `added_by`, `added_on`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', array($name, $perm_artifacts, $perm_cerberus, $perm_home, $perm_logs, $perm_modules, $perm_perms, $perm_planets, $perm_planning, $perm_progress, $perm_quickstats, $perm_rates, $perm_roles, $perm_sheets, $perm_ships, $perm_spacestations, $perm_tips, $perm_tools, $perm_usergroups, $perm_users, $perm_visuals, $perm_white_star, $_SESSION['user_id'], date('Y-m-d H:i:s')));
    }

    /**
     * 
     * Edit permission if form is sent
     * @param string        $name                    The name of the artifact
     * @param int           $id                      The id of the artifact to edit
     * @param int           $perm_artifact           The artifact permission setting
     * @param int           $perm_cerberus           The cerberus permission setting
     * @param int           $perm_home               The home permission setting
     * @param int           $perm_logs               The logs permission setting
     * @param int           $perm_modules            The modules permission setting
     * @param int           $perm_perms              The permissions permission setting
     * @param int           $perm_planets            The planets permission setting
     * @param int           $perm_planning           The planning permission setting
     * @param int           $perm_progress           The progress permission setting
     * @param int           $perm_quickstats         The quickstats permission setting
     * @param int           $perm_rates              The rates permission setting
     * @param int           $perm_roles              The roles permission setting
     * @param int           $perm_sheets             The sheet permission setting
     * @param int           $perm_ships              The ships permission setting
     * @param int           $perm_spacestations      The spacestations permission setting
     * @param int           $perm_tips               The tips permission setting
     * @param int           $perm_tools              The tools permission setting
     * @param int           $perm_usergroups         The usergroups permission setting
     * @param int           $perm_users              The users permission setting
     * @param int           $perm_visuals            The visuals permission setting
     * @param int           $perm_white_star         The white star permission setting
     * 
     */

    public function edit($id, $name, $perm_artifact, $perm_cerberus, $perm_home, $perm_logs, $perm_modules, $perm_perms, $perm_planets, $perm_planning, $perm_progress, $perm_quickstats, $perm_rates, $perm_roles, $perm_sheets, $perm_ships, $perm_spacestations, $perm_tips, $perm_tools, $perm_usergroups, $perm_users, $perm_visuals, $perm_white_star)
    {
        $perm_artifact = checkbox($perm_artifact);
        $perm_cerberus = checkbox($perm_cerberus);
        $perm_home = checkbox($perm_home);
        $perm_logs = checkbox($perm_logs);
        $perm_modules = checkbox($perm_modules);
        $perm_perms = checkbox($perm_perms);
        $perm_planets = checkbox($perm_planets);
        $perm_planning = checkbox($perm_planning);
        $perm_progress = checkbox($perm_progress);
        $perm_quickstats = checkbox($perm_quickstats);
        $perm_rates = checkbox($perm_rates);
        $perm_roles = checkbox($perm_roles);            
        $perm_sheets = checkbox($perm_sheets);
        $perm_ships = checkbox($perm_ships);            
        $perm_spacestations = checkbox($perm_spacestations);
        $perm_tips = checkbox($perm_tips);
        $perm_tools = checkbox($perm_tools);
        $perm_usergroups = checkbox($perm_usergroups);
        $perm_users = checkbox($perm_users);
        $perm_visuals = checkbox($perm_visuals);
        $perm_white_star = checkbox($perm_white_star);

        $this->db->none('UPDATE `permissions` SET `name` = ?, `perm_artifacts` = ?, `perm_cerberus` = ?, `perm_home` = ?, `perm_logs` = ?, `perm_modules` = ?, `perm_perms` = ?, `perm_planets` = ?, `perm_planning` = ?, `perm_progress` = ?, `perm_quickstats` = ?, `perm_rates` = ?, `perm_roles` = ?, `perm_sheet` = ?, `perm_ships` = ?, `perm_spacestations` = ?, `perm_tips` = ?, `perm_tools` = ?, `perm_usergroups` = ?, `perm_users` = ?, `perm_visuals` = ?, `perm_white_star` = ?, `editted_by` = ?, `editted_on` = ? WHERE `id` = ?', array($name, $perm_artifacts, $perm_cerberus, $perm_home, $perm_logs, $perm_modules, $perm_perms, $perm_planets, $perm_planning, $perm_progress, $perm_quickstats, $perm_rates, $perm_roles, $perm_sheets, $perm_ships, $perm_spacestations, $perm_tips, $perm_tools, $perm_usergroups, $perm_users, $perm_visuals, $perm_white_star, $_SESSION['user_id'], date('Y-m-d H:i:s'), $id));
    }
}