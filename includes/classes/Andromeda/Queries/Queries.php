<?php

namespace Andromeda\Queries;

class Queries {

    private $db = null;
    private $table = null;

    public function __construct($db, $table)
    {
        $this->db = $db;
        $this->table = $table;
    }

    public function parse($array)
    {
        $fp = fopen('includes/json/results.json', 'w');
        fwrite($fp, json_encode($array));
        fclose($fp);
    }

    public function result()
    {
        return file_get_contents('includes/json/results.json');
    }

    public function all()
    {
        $all = $this->db->all('SELECT * FROM `'.$this->table.'` WHERE `deleted_by` IS NULL');
        $this->parse($all);
    }

    public function count()
    {
        $count = $this->db->one('SELECT COUNT(*) FROM `'.$this->table.'` WHERE `deleted_by` IS NULL');
        $this->parse($count);
    }
}