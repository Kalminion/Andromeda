<?php

namespace Andromeda\Queries;

use Andromeda\classes\Db;

class ArtifactsVariables
{

    private $db = null;

    public function __construct($db)
    {
        $this->db = $db;
    }

    /**
     * 
     * Count all artifact variables
     * @return int
     * 
     */

    public function count()
    {
        return $this->db->one('SELECT COUNT(*) FROM `artifacts_variables` WHERE `deleted_by` IS NULL');
    }

    /**
     * 
     * Get all artifact variables
     * @return array
     * 
     */

    public function all()
    {
        return $this->db->all('SELECT * FROM `artifacts_variables` WHERE `deleted_by` IS NULL');
    }

    /**
     * 
     * Get all artifact variables from one artifact
     * @param int       $artifact_id            The artifact ID to get variables from
     * 
     */

    public function get_from_artifact($artifact_id)
    {
        return $this->db->all('SELECT * FROM `artifacts_variables` WHERE `artifacts_id` = ? AND `deleted_by` IS NULL', array($artifact_id));
    }

    /**
     * 
     * Get one artifact variable from it's ID
     * @param int       $variable_id            The artifact variable id to search
     * @return array
     * 
     */

    public function get($variable_id)
    {
        return $this->db->row('SELECT * FROM `artifacts_variables` WHERE `id` = ? AND `deleted_by` IS NULL', array($variable_id));
    }

    /**
     * 
     * Delete artifact variable by it's ID
     * @param int       $variable_id            The artifact variable id to delete
     * 
     */

    public function delete($variable_id)
    {
        $this->db->none('UPDATE `artifacts_variables` SET `deleted_by` = ?, `deleted_on` = ? WHERE `id` = ?', array($_SESSION['user'], date('Y-m-d H:i:s'), $variable_id));
        $this->db->none('UPDATE `artifacts_levels` SET `deleted_by` = ?, `deleted_on` = ? WHERE `artifacts_variables_id` = ?', array($_SESSION['user'], date('Y-m-d H:i:s'), $variable_id));
    }

    /**
     * 
     * Add artifact variables when form is sent
     * @param string        $name           The name of the artifact variable
     * @param int           $artifacts_id   The artifact the variable is connected to
     * 
     */

    public function add($name, $artifacts_id)
    {
        $this->db->none('INSERT INTO `artifacts_variables` (`name`, `artifacts_id`, `added_by`, `added_on`) VALUES (?, ?, ?, ?)', array($name, $artifacts_id, $_SESSION['user'], date('Y-m-d H:i:s')));
    }

    /**
     * 
     * Edit artifact variables when form is sent
     * @param string        $name           The name of the artifact variable
     * @param int           $id             The id of the artifact variable to edit
     * 
     */

    public function edit($id, $name)
    {
        $this->db->none('UPDATE `artifacts_variables` SET `name` = ?, `editted_by` = ?, `editted_on` = ? WHERE `id` = ?', array($name, $_SESSION['user'], date('Y-m-d H:i:s'), $id));
    }
}