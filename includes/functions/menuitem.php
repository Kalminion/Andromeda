<?php

/**
 * 
 * This functions draws a single menuitem
 * @param string        $name       The name of the menuitem
 * @param string/array  $link       The destination of the menuitem OR an multidimensional array with $name, $link paramaters
 * @param int           $menu_id    (optional) The menu id, for multiple of the same menus, NOT OPTIONAL when used for submenus
 * 
 */

function menuitem($name, $link, $menu_id = NULL)
{
    if (is_array($link)) {
        echo '<span class="menuitem" onclick="submenu(\''.$name.$menu_id.'\')">'.$name.'</span>';
        echo '<div id="'.$name.$menu_id.'" class="submenu">';
        
        foreach($link as $link_key => $link_value) {
            echo '<a class="submenuitem" href="'.$link_value[1].'">'.$link_value[0].'</a>';
        }
        
        echo '</div>';
    } else {
        echo '<a class="menuitem" href="'.$link.'">'.$name.'</a>';
    }
}