<?php

/**
 * This file contains the autoloader function
 */

spl_autoload_register(function ($class_name) {
    require_once 'includes/classes/' . $class_name . '.php';
});