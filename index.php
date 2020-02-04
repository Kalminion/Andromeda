<?php
    session_start();

    // Load all files
    require_once('includes/include/files.php');

    // Set error reporting "ON" / "OFF"
    e_reporting('ON');
?>

<html lang="en">
<head>
    <meta charset="utf-8">

    <title>KLM/Flying Dutchmen</title>
    <meta name="description" content="The Dutch Hades Star Corporation">
    <meta name="author" content="Yah Boo">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="includes/css/style.css">
    <link rel="stylesheet" media="screen and (max-width: 600px)" href="includes/css/600.css" />
    <link rel="stylesheet" media="screen and (min-width: 601px) and (max-width: 1000px)" href="includes/css/1000.css" />
    <link rel="stylesheet" media="screen and (min-width: 1001px) and (max-width: 1200px)" href="includes/css/1200.css" />
    <link rel="stylesheet" media="screen and (min-width: 1201px)" href="includes/css/default.css" />

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="includes/js/menu.js"></script>
    <script src="includes/js/submenu.js"></script>
    <script src="includes/js/request.js"></script>

    <script src="includes/js/pages.js"></script>
</head>

<body>
    <div class="container">
<?php
        include('includes/page_parts/header.php');
?>
        <div class="center">
<?php
            include('includes/page_parts/menu_wrapper.php');

            include('includes/page_parts/main.php');
?>
        </div> <!-- END CENTER -->

    </div> <!-- END CONTAINER -->
</body>
</html>