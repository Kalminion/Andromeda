<?php

/**
 * This page initiates all query classes
 */

use Andromeda\Queries as Query;

$artifacts_statics = new Query\ArtifactsStatics($db);
$artifacts_values = new Query\ArtifactsValues($db);
$artifacts_variables = new Query\ArtifactsVariables($db);    
$artifacts = new Query\Artifacts($db);

require_once('includes/classes/Andromeda/queries/permissions.php');
require_once('includes/classes/Andromeda/queries/users.php');
require_once('includes/classes/Andromeda/queries/visuals.php');