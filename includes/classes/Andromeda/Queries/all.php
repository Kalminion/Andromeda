<?php

/**
 * This page initiates all query classes
 */

use Andromeda\Queries as Query;

$artifacts_statics = new Query\ArtifactsStatics($db);
$artifacts_values = new Query\ArtifactsValues($db);
$artifacts_variables = new Query\ArtifactsVariables($db);    
$artifacts = new Query\Artifacts($db);
$permisssions = new Query\Permissions($db);
$users = new Query\Users($db);
$visuals = new Query\Visuals($db);
$cerbs= new Query\Pages($db, 'cerberus');