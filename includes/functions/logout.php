<?php

/**
 * This file contains the $_SESSION['user'] reset when a user logged out
 */

if (isset($_GET['logout']) && $_GET['logout'] == 'true') {
    $_SESSION['user'] = NULL;
}