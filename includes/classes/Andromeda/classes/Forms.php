<?php

/**
 * This file contains the Forms class, used for drawing forms
 */

namespace Andromeda\Classes;

class Forms
{

    private $db = NULL;
    private $skip = array('id', 'added_by', 'added_on', 'editted_by', 'editted_on', 'deleted_by', 'deleted_on');
    private $formfield_level = '<div><label for="id_level">Level</label><input type="number" name="level" id="id_level" /></div>';
    private $parent_table = NULL;
    private $parent_where = NULL;
    private $parents_content = NULL;
    private $columns = NULL;

    public function __construct($db) {
        $this->db = $db;
    }

    /**
     * 
     * If set, set formaction
     * If formaction is NULL, formaction will not be set
     * @param string $action        Form action link
     * 
     */

    private function formAction(&$action = NULL) {
        if (isset($action) && $action != NULL) {
            $action = 'action="'.$action.'"';
        }
    }

    /**
     * 
     * Check if form to be build is an _values form
     * @param string $table         The table to build the form for
     * @return boolean
     * 
     */

    private function isValues($table) {

        if (substr($table, -6) == 'values') {
            return true;
        }
        return false;

    }

    /**
     * 
     * Add underscores to name and make lowercase
     * @param string $name          The name to edit
     * @return string
     * 
     */

    private function makeId($name) {
        return strtolower(str_replace(' ', '_',$name));
    }

    /**
     * 
     * Set parent table and parent id to look for
     * @param string $table         The table to build the parent names for
     * 
     */

    private function setParent($table) {
        // Set base name for parent variables from values
        $parent = substr($table, 0, -6);

        // Set query variables
        $this->parent_table = $parent.'variables';
        $this->parent_where = $parent.'id';
    }

    /**
     * 
     * Get parent content to produce form rows for the values form
     * 
     */

    private function getParent($table) {
        $this->setParent($table);

        // Get parent variables
        $this->parents_content = $this->db->all('SELECT * FROM `'.$this->parent_table.'` WHERE `'.$this->parent_where.'` = ? AND `DELETED_BY` IS NULL', array($_GET[$this->parent_where]));
    }

    private function drawInput($name) {
        echo '<div>';

        // Add underscores from names and make lowercase
        $id = $this->makeId($name);

        echo '<label for="id_'.$id.'">'.$name.'</label>';
        echo '<input type="text" name="'.$id.'" id="id_'.$id.'" />';

        echo '</div>';
    }

    /**
     * 
     * Draw an add values form
     * 
     */

    private function addValuesForm($table) {

        // Echo the formfield "Level"
        echo $this->formfield_level;

        // Set parent content ($parents_content)
        $this->getParent($table);

        foreach($this->parents_content as $key => $value) {
            $this->drawInput($value['name']);
        }
    }

    /**
     * 
     * Get all columns from the requested table
     * @param string $table         The table to get the columns of
     * 
     */

    private function setColumns($table) {
        $this->columns = $this->db->all('SELECT * FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA` = "andromeda" AND `TABLE_NAME` = ?', array($table));
    }

    /**
     * 
     * Check if column name is not in the "to skip" array
     * @param string $column        The column to check
     * @return boolean
     * 
     */

    private function skip($column) {
        if (!in_array($column, $this->skip)) {
            return true;
        }
        return false;
    }

    /**
     * 
     * Check if column name is an foreign id field
     * @param string $column            The column name to check
     * @return boolean
     * 
     */

    private function isId($column) {
        if(substr($column, -2) == 'id') {
            return true;
        }
        return false;
    }

    /**
     * 
     * Draw hidden foreign id field
     * @param string $name          The name of the foreign id
     * 
     */

    private function idField($name) {
        echo '<input type="hidden" name="'.$name.'" value="'.$_GET[$name].'" />';
    }

    /**
     * 
     * Set required for input field
     * @param string $is_nullable_field     The IS_NULLABLE item from the INFORMATION SCHEME table
     * 
     */

    private function setRequired($is_nullable_field) {
    
        if ($is_nullable_field == 'NO') {
            $this->required = 'required';
        }
    }

    /**
     * 
     * Remove underscores from names and capitalize
     * @param string $name          The name to edit
     * @return string
     * 
     */
    
    private function setName($name) {
        return ucwords(str_replace('_', ' ', $name));
    }

    private function buildInput($column_name, $data_type, $is_nullable) {
        // Start of the row
        echo '<div>';

        // Remove underscores from names and capitalize. Then draw label
        $name = $this->setName($column_name);
        echo '<label for="id_'.$column_name.'">'.$name.'</label>';

        // Set required field
        $required = $this->setRequired($is_nullable);

        // For each datatype draw a different input line
        switch($data_type) {
            case 'text':
                echo '<input type="text" name="'.$column_name.'" id="id_'.$column_name.'" '.$required.' />';
            break;
            case 'int':
                echo '<input type="number" name="'.$column_name.'" id="id_'.$column_name.'" '.$required.' />';
            break;
            case 'tinyint':
                echo '<input type="checkbox" name="'.$column_name.'" id="id_'.$column_name.'" '.$required.' />';
            break;
        }

        // End of the row
        echo '</div>';
    }

    /**
     * 
     * Draw add form
     * 
     */

    private function addForm($table) {

        $this->setColumns($table);

        // Loop through all column names from the table
        foreach($this->columns as $key => $value) {
        
            // Skip standard column names
            if ($this->skip($value['COLUMN_NAME'])) {

                // Check if column is foreign id field
                if ($this->isId($value['COLUMN_NAME'])) {
                    $this->idField($value['COLUMN_NAME']);
                    continue;
                }

                // Set required for input
                $this->setRequired($value['IS_NULLABLE']);

                // Draw input line
                $this->buildInput($value['COLUMN_NAME'], $value['DATA_TYPE'], $value['IS_NULLABLE']);

            }
        }
    }

    /**
     * 
     * Build an add form for a database table
     * @param string $table         The table to build the form for
     * @param string $action        The form action link
     * 
     */

    public function add($table, $action = NULL) {

        // Set form action by reference
        $this->formAction($action);

        // Start form
        echo '<form method="post" '.$action.' >';

            // Check if the table is a _values table
            if ($this->isValues($table)) {
                $this->addValuesForm($table);

            } else {
                $this->addForm($table);
            }

            // Add form identifier
            echo '<input type="hidden" name="form" value="add_'.$table.'" />';

            // Submit and end
            echo '<div><input type="submit" value="Save" /></div>';
        echo '</form>';
    }
}