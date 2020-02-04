<?php

/**
 * This file contains the database connection with communication methods
 */

namespace Andromeda\Classes;

use \PDO;

class Db
{

    public $db_debug;
    public $db_pdo;

    /**
     *
     * Create new PDO connection with the passed variables
     * Set attributes: Switch on errors and exceptions
     *
     * @param string $db_name        The name of the database
     * @param string $db_host        The location of the database
     * @param string $db_username    The username to access the database
     * @param string $db_password    The password of the username
     *
     */

    public function __construct($db_name, $db_host, $db_username, $db_password)
    {
        
        $this->db_pdo = new \PDO('mysql:dbname='.$db_name.';host='.$db_host, $db_username, $db_password);
        $this->db_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    /**
     *
     * Function to return all matched rows from database
     * TRY to run the SQL query
     * Return all of the results (if succeeded) in a multidimensional array
     * CATCH and save the error when failed
     *
     * @param string $query          SQL Query
     * @param array  $variables      Array of the variables to be passed (optional)
     *
     * @return array (multidimensional)
     *
     */

    public function all($query, $variables = array())
    {

        try {
            $run = $this->db_pdo->prepare($query);
            $run->execute($variables);
            return $run->fetchAll(PDO::FETCH_ASSOC);

        } catch(PDOException $e) {
            $this->db_debug = 'db::all() failed: '.$e->getMessage();
            $this->db_debug .= '<br>'.$query;
        }
    }

    /**
     *
     * Function to return one (first) row from the database
     * TRY to run the SQL query
     * Return all of the results (if succeeded) in a multidimensional array
     * CATCH and save the error when failed
     *
     * @param string $query          SQL query
     * @param array  $variables      Array of the variables to be passed (optional)
     *
     * @return array
     *
     */

    public function row($query, $variables = array())
    {
        try {
            $run = $this->db_pdo->prepare($query);
            $run->execute($variables);
            return $run->fetch(PDO::FETCH_ASSOC);

        } catch(PDOException $e) {
            $this->db_debug = 'db::row() failed: '.$e->getMessage();
            $this->db_debug .= '<br>'.$query;
        }
    }

    /**
     *
     * Function to return one value from the database
     * TRY to run the SQL query
     * Return all of the results (if succeeded) in a multidimensional array
     * CATCH and save the error when failed
     *
     * @param string $query          SQL query
     * @param array  $variables      Array of the variables to be passed (optional)
     *
     * @return string
     *
     */
        
    public function one($query, $variables = array())
    {

        try {
            $run = $this->db_pdo->prepare($query);
            $run->execute($variables);
            return $run->fetchColumn();

        } catch(PDOException $e) {
            $this->db_debug = 'db::one() failed: '.$e->getMessage();
            $this->db_debug .= '<br>'.$query;
        }
    }

    /**
     *
     * Function returns no values from the database
     * TRY to run the SQL query
     * Return all of the results (if succeeded) in a multidimensional array
     * CATCH and save the error when failed
     *
     * @param string $query          SQL query
     * @param array  $variables      Array of the variables to be passed (optional)
     *
     * @return string
     *
     */

    public function none($query, $variables = array())
    {

        try {
            $run = $this->db_pdo->prepare($query);
            return $run->execute($variables);

        } catch(PDOException $e) {
            $this->db_debug = 'db::none() failed: '.$e->getMessage();
            $this->db_debug .= '<br>'.$query;
        }
    }

    /**
     *
     * Function returns the last added id
     * TRY to run the SQL query
     * CATCH and save the error when failed
     *
     * @return string
     *
     */

    public function last()
    {

        try {
            return $this->db_pdo->lastInsertId();

        } catch(PDOException $e) {
            $this->db_debug = 'db::last() failed: '.$e->getMessage();
            $this->db_debug .= '<br>'.$query;
        }
    }
}