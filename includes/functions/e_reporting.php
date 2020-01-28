<?php

/**
 * 
 * Function to toggle all error reportings on or off
 * @param string $toggle        "ON" switches errors on, "OFF" switches errors off
 * 
 */

function e_reporting($toggle)
{
    if ($toggle == 'ON') {
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
    } elseif($toggle == 'OFF') {
        ini_set('display_errors', 0);
        ini_set('display_startup_errors', 0);
        error_reporting(0);
    }
}