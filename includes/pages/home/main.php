<?php

/**
 * This file contains the home page content
 */

$home = $db->row('SELECT * FROM `home`');
echo '<style>'.$home['css'].'</style>';
echo '<script>'.$home['javascript'].'</script>';
echo $home['html'];