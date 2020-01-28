<nav id="menu">
    <div class="menu_slider_content" id="menu_slider_content">
<?php
        $menu_id = 1;
        include('includes/page_parts/menu.php');
?>
    </div> <!-- END MENU SLIDER CONTENT -->

    <div class="menu_slider" id="menu_slider">
        <div class="menu_slider_container">
        </div> <!-- END MENU SLIDER CONTAINER -->
    </div> <!-- END MENU SLIDER -->

    <div class="menu_static">
<?php
        $menu_id = 2;
        include('includes/page_parts/menu.php');
?>
    </div> <!-- END MENU STATIC -->
</nav>