<?php
/**
 * Plugin Name: Custom Admin Menu Plugin
 * Description: Enhances the admin menu with dynamic arrow colors and optimized submenu alignment.
 * Version: 1.1
 * Author: Lyhtande
 * Author URI: https://github.com/Lyhtande
 * Plugin URI: https://github.com/Lyhtande/Wordpress-Custom-Admin-Menu-Plugin
 * GitHub Plugin URI: https://github.com/Lyhtande/Wordpress-Custom-Admin-Menu-Plugin
 * GitHub Branch: main
 */

// Enqueue admin scripts and styles
add_action('admin_enqueue_scripts', 'custom_admin_menu_scripts');
function custom_admin_menu_scripts() {
    // Include CSS
    wp_enqueue_style('custom-admin-menu-css', plugin_dir_url(__FILE__) . 'css/custom-admin-menu.css');

    // Include JavaScript
    wp_enqueue_script('custom-admin-menu-js', plugin_dir_url(__FILE__) . 'js/custom-admin-menu.js', array('jquery'), null, true);
}

// Add dynamic colors for admin arrows
add_action('admin_head', 'custom_admin_menu_arrow_color');
function custom_admin_menu_arrow_color() {
    global $_wp_admin_css_colors;

    // Get the user's current admin color scheme
    $user_admin_color = get_user_option('admin_color');

    if (isset($_wp_admin_css_colors[$user_admin_color])) {
        $colors = $_wp_admin_css_colors[$user_admin_color]->colors;

        // Use the first color in the scheme for arrows
        $arrow_color = $colors[0];

        // Inject dynamic CSS for arrow colors
        echo '<style>
            #adminmenu li.menu-top:hover > a.wp-has-submenu::after,
            #adminmenu li.menu-top:hover > a.wp-has-current-submenu::after {
                border-right-color: ' . esc_attr($arrow_color) . ' !important;
            }
        </style>';
    }
}

