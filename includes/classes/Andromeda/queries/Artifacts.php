<?php

namespace Andromeda\Queries;

use Andromeda\classes\Db;

class artifacts {

    private $db = null;

    public function __construct($db)
    {
        $this->db = $db;
    }

    /**
     * 
     * Counts all artifacts
     * @return int
     * 
     */

    public function count()
    {
        return $this->db->one('SELECT COUNT(*) FROM `artifacts` WHERE `deleted_by` IS NULL');
    }

    /**
     * 
     * Get all artifacts
     * @return array
     * 
     */

    public function all()
    {
        return $this->db->all('SELECT * FROM `artifacts` WHERE `deleted_by` IS NULL');
    }

    /**
     * 
     * Get a single artifact by it's ID
     * @param int   $artifact_id    The ID of the artifact
     * @return array
     * 
     */

    public function get($id)
    {
        return $this->db->row('SELECT * FROM `artifacts` WHERE `id` = ? AND `deleted_by` IS NULL', array($id));
    }

    /**
     * 
     * Delete artifact, and all the variables, values and statics that belong to the artifact
     * @param int   $id            The artifact to delete
     * 
     */

    public function delete($id)
    {
        foreach($GLOBALS['artifacts_variables']->get_from_artifact($id) as $variable_key => $variable_value) {
            $this->db->none('UPDATE `artifacts_variables` SET `deleted_by` = ?, `deleted_on` = ? WHERE `id` = ?', array($_SESSION['user'], date('Y-m-d H:i:s'), $variable_value['id']));
            $this->db->none('UPDATE `artifacts_levels` SET `deleted_by` = ?, `deleted_on` = ? WHERE `artifacts_variables_id` = ?', array($_SESSION['user'], date('Y-m-d H:i:s'), $variable_value['id']));
        }
        $this->db->none('UPDATE `artifacts_statics` SET `deleted_by` = ?, `deleted_on` = ? WHERE `artifacts_id` = ?', array($_SESSION['user'], date('Y-m-d H:i:s'), artifacts_id($id)));
        $this->db->none('UPDATE `artifacts` SET `deleted_by` = ?, `deleted_on` = ? WHERE `id` = ?', array($_SESSION['user'], date('Y-m-d H:i:s'), artifacts_id($id)));
    }

    /**
     * 
     * Add artifacts when form is sent
     * @param string    $name               The name of the artifact
     * @param string    $description        The description of the artifact
     * @param string    $image              The image of the artifact
     * 
     */

    public function add($name, $description, $image)
    {
        $this->db->none('INSERT INTO `artifacts` (`name`, `description`, `image`, `added_by`, `added_on`) VALUES (?, ?, ?, ?, ?)', array($name, $description, $image, $_SESSION['user'], date('Y-m-d H:i:s')));
    }

    /**
     * 
     * Edit artifacts when form is sent
     * @param string    $name               The name of the artifact
     * @param string    $description        The description of the artifact
     * @param int       $id                 The id of the artifact to edit
     * @param string    $image              The image of the artifact
     * 
     */

    public function edit($id, $name, $description, $image)
    {
        $this->db->none('UPDATE `artifacts` SET `name` = ?, `description` = ?, `image` = ?, `editted_by` = ?, `editted_on` = ? WHERE `id` = ?', array($name, $description, $image, $_SESSION['user'], date('Y-m-d H:i:s'), $id));
    }
}