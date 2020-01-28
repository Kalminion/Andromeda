<?php

namespace Andromeda\Queries;

use Andromeda\classes\Db;

class ArtifactsStatics
{

    private $db = null;

    public function __construct($db)
    {
        $this->db = $db;
    }

    /**
     * 
     * Count artifact statics
     * @return  int
     * 
     */

    public function count()
    {
        return $this->db->one('SELECT COUNT(*) FROM `artifacts_statics` WHERE `deleted_by` IS NULL');
    }

    /**
     * 
     * Get all artifact statics
     * @return  array
     * 
     */

    public function all()
    {
        return $this->db->all('SELECT * FROM `artifacts_statics` WHERE `deleted_by` IS NULL');
    }

    /**
     * 
     * Get artifact statics from it's ID
     * @param   int     $static_id      The artifact statics id
     * @return  array
     * 
     */

    public function get($id)
    {
        return $this->db->row('SELECT * FROM `artifacts_statics` WHERE `id` = ? AND `deleted_by` IS NULL', array($id));
    }

    /**
     * 
     * Delete artifact by it's ID
     * @param   int     $static_id      The artifact static id
     * 
     */

    public function delete($id)
    {
        $this->db->none('UPDATE `artifacts_statics` SET `deleted_by` = ?, `deleted_on` = ? WHERE `id` = ?', array($_SESSION['user'], date('Y-m-d'), $id));
    }

    /**
     * 
     * Add artifact statics
     * @param int           $artifact_id        The artifact the static is connected to
     * @param string        $name               The name of the artifact static
     * @param string        $value              The value of the artifact static
     * 
     */

    public function add($artifact_id, $name, $value)
    {
        $this->db->none('INSERT INTO `artifacts_statics` (`artifact_id`, `name`, `value`, `added_by`, `added_on`) VALUES (?, ?, ?, ?, ?)', array($artifact_id, $name, $value, $_SESSION['user'], date('Y-m-d H:i:s')));
    }

    /**
     * 
     * Edit artifact statics
     * @param string        $name               The name of the artifact static
     * @param string        $value              The value of the artifact static
     * 
     */

    public function edit($id, $name, $value)
    {
        $this->db->none('UPDATE `artifacts_statics` SET `name` = ?, `value` = ?, `editted_by` = ?, `editted_on` = ? WHERE `id` = ?', array($name, $value, $_SESSION['user'], date('Y-m-d H:i:s'), $id));
    }
}