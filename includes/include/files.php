<?php

/**
 * 
 * Include the class autoloader function
 * 
 */

require_once('includes/functions/autoload.php');

/**
 * 
 * Include file with function to switch error reporting on or off
 * Usage:
 * e_reporting('ON') or e_reporting('OFF');
 * 
 */

require_once('includes/functions/e_reporting.php');

/**
 * 
 * Include database configuration file
 * 
 */

require_once('includes/connections/config.php');

/**
 * 
 * Initiate Db class
 * 
 */

use Andromeda\Classes as Base;
$db = new Base\Db($db_name, $db_host, $db_username, $db_password);

/**
 * 
 * Initiate Forms class
 * 
 */

$forms = new Base\Forms($db);

/**
 * 
 * Include all MySQL queries
 * 
 */

require_once('includes/classes/Andromeda/queries/all.php');

$rights = new Base\Rights($db);

/**
 * 
 * Include file where logout action is handled
 * Passive function
 * 
 */
require_once('includes/functions/logout.php');

/**
 * 
 * Include forms switch
 * 
 */
require_once('includes/functions/forms.php');

/**
 * 
 * Include function to check the rights of the user for accessing pages and content
 * Usage:
 * rights($permission) where $permission is the database name of the permission
 * 
 */

//require_once('includes/functions/rights.php');

/**
 * 
 * Include function to draw a single menuitem
 * Usage:
 * menuitem($name, $link);
 * 
 */

require_once('includes/functions/menuitem.php');