<?php

namespace Andromeda\Queries;

use Andromeda\classes\Db;

class ArtifactsValues {

    private $db = null;

    public function __construct($db)
    {
        $this->db = $db;
    }

    /**
     * 
     * Get the highest level from an artifact variable
     * @param int       $variable_id                    The variable ID to get the highest level from
     * @return int
     * 
     */

    public function countLevels($variable_id)
    {
        return $this->db->one('SELECT MAX(`level`) FROM `artifacts_values` WHERE `artifacts_variables_id` = ? AND `deleted_by` IS NULL',array($variable_id));
    }

    /**
     * 
     * Get the highest level from an artifact
     * @param int       $artifact_id                    The artifact ID to get the highest level from
     * @return int
     * 
     */

    public function maxArtifactLevel($artifact_id)
    {
        $maxlevel = 1;

        $variables = $this->db->all('SELECT * FROM `artifacts_variables` WHERE `artifacts_id` = ? AND `deleted_by` IS NULL', array($artifact_id));

        foreach($variables as $variable_key => $variable_value) {

            if ($maxlevel < $this->countLevels($variable_value['id'])) {
                $maxlevel = $this->countLevels($variable_value['id']);
            }
        }

        return $maxlevel;
    }

    /**
     * 
     * Get artifact values from the variable and level
     * @param int       $variables_id                   The variable ID to get values from
     * @param int       $level                          The level to get the values from
     * @return array
     * 
     */

    public function fromVariableAndLevel($variables_id, $level)
    {
        return $this->db->row('SELECT * FROM `artifacts_values` WHERE `artifacts_variables_id` = ? AND `level` = ? AND `deleted_by` IS NULL', array($variables_id, $level));
    }

    /**
     * 
     * Get artifact values from artifact variable
     * @param int       $variable_id                    The variable ID to get values from
     * @return array
     * 
     */

    public function get($variable_id)
    {
        return $this->db->row('SELECT * FROM `artifacts_values` WHERE `artifacts_variables_id` = ? AND `deleted_by` IS NULL', array($variable_id));
    }

    /**
     * 
     * Count artifact values from the variable and level
     * @param int       $variables_id                   The variable ID to count values from
     * @param int       $level                          The level to count the values from
     * 
     * @return int
     * 
     */

    public function countFromVariableAndLevel($variable_id, $level)
    {
        return $this->db->one('SELECT COUNT(*) FROM `artifacts_values` WHERE `artifacts_variables_id` = ? AND `level` = ? AND `deleted_by` IS NULL',array($variable_id, $level));
    }

    /**
     * 
     * Delete artifact value by variable ID and level
     * @param int       $variables_id                   The variable ID to delete level from
     * @param int       $level                          The level to delete
     * 
     */

    public function delete($variable_id, $level)
    {
        foreach($GLOBALS['artifacts_variables']->getFromArtifact($variable_id) as $variable_key => $variable_value) {
            $this->db->none('UPDATE `artifacts_values` SET `deleted_by` = ?, `deleted_on` = ? WHERE `artifacts_variables_id` = ? AND `level` = ?', array($_SESSION['user'], date('Y-m-d H:i:s'), $variable_value['id'], $level));
        }
    }

    /**
     * 
     * Loop through all artifacts variables to  add when form is sent
     * For every entry, check the set value for the variable
     * After the value is checked, add the value in the database
     * @param int           $artifact_id            The artifact to get all variables from
     * @param int           $level                  The artifact level to set variables for
     * 
     */

    public function addAll($artifact_id, $level)
    {   
        foreach($GLOBALS['artifacts_variables']->getFromArtifact($artifact_id) as $variable_key => $variable_value) {            
            $value = $this->addSet($_POST[$variable_value['id']]);
            $this->add($variable_value['id'], $level, $value);   
        }
    }

    /**
     * 
     * Set artifacts value, make sure no empty values are sent
     * Empty lines in the database can cause tables to display information wrong
     * @param string        $check_value        The value to be checked
     * 
     * @return string
     * 
     */

    public function addSet($check_value)
    {    
        $value = 'No value';

        if (isset($check_value) && $check_value != NULL) {
            $value = $check_value;
        }

        return $value;
    }

    /**
     * 
     * Add artifact values after form is sent
     * @param int           $variable_id        The artifact variable the value is connected to
     * @param int           $level              The level of the value
     * @param string        $value              The value to set to level and variable
     * 
     */

    public function add($variable_id, $level, $value)
    {
        $this->db->none('INSERT INTO `artifacts_values` (`artifacts_variables_id`, `level`, `value`, `added_by`, `added_on`) VALUES (?, ?, ?, ?, ?)', array($variable_id, $level, $value, $_SESSION['user'], date('Y-m-d H:i:s')));
    }

    /**
     * 
     * Loop through all POST fields when artifacts values form is sent
     * Check if value is already in the database
     * If not, insert new field
     * If it is, update existing field
     * 
     */

    public function edit_all()
    {
        // Loop through all post fields
        foreach($_POST as $key => $value) {

            // Form fields to skip
            $skip = array('level', 'form', 'artifact_id', 'editted_on', 'editted_by');
            
            if (!in_array($key, $skip)) {

                // Count if values are already in database. If so, update. If not, insert
                $count = $this->countFromVariableAndLevel($key, $_POST['level']);

                if ($count > 0) {
                    $this->edit($value, $key, $level);

                } else {
                    $this->add($key, $_POST['level'], $value);
                    
                }
            }
        }
    }

    /**
     * 
     * Edit artifact values
     * @param string            $value          The new value for the variable and level
     * @param int               $variable_id    The variable ID to edit the values from
     * @param int               $level          The level to edit the values from
     * 
     */

    public function edit($value, $variable_id, $level)
    {
        $this->db->none('UPDATE `artifacts_values` SET `value` = ?, `editted_by` = ?, `editted_on` = ? WHERE `artifacts_variables_id` = ? AND `level` = ?', array($value, $_SESSION['user'], date('Y-m-d H:i:s'), $artifact_id, $level));
    }
}