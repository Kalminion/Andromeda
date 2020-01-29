<?php

require_once('includes/functions/autoload.php');

require_once('includes/functions/e_reporting.php');

require_once('includes/connections/config.php');

use Andromeda\Classes as Base;
$db = new Base\Db($db_name, $db_host, $db_username, $db_password);

$forms = new Base\Forms($db);

require_once('includes/classes/Andromeda/queries/all.php');

$rights = new Base\Rights($db);

require_once('includes/functions/logout.php');

require_once('includes/functions/forms.php');

require_once('includes/functions/menuitem.php');