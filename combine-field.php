<?php

/**
 * @package CombineField
 **/
/**
 * Plugin Name: Combine Search Option Field
 * Plugin URI: https://github.com/AAbbasRR/CombineField-Wordpress-Plugin
 * Description: This is the very first plugin I ever created.
 * Version: 1.0
 * Author: Abbas Rahimzadeh
 * Author URI: https://github.com/AAbbasRR
 * Licens: MIT 
 **/
include 'inclueds/field_db.php';
register_activation_hook(__FILE__, 'get_or_create_table');
if (!class_exists('WP_List_Table')) {
    require_once(ABSPATH . 'wp-admin/includes/class-wp-list-table.php');
}

function register_in_menu_item()
{
    add_menu_page("مدیریت فیلد", "مدیریت فیلد", "manage_options", "manage-fields", "manage_fields_combine", "dashicons-admin-generic", 40);
    add_submenu_page("manage-fields", "مدیریت آپشن", "مدیریت آپشن", "manage_options", "manage-options", "manage_options_combine");
}
add_action("admin_menu", "register_in_menu_item");


function manage_fields_combine()
{
?>
    <h1>
        <?php esc_html_e('مدیریت فیلد', 'my-plugin-textdomain'); ?>
    </h1>
    <h4>
        <?php esc_html_e('در این صفحه شما میتوانید فیلدهای خود را مدیریت کنید', 'my-plugin-textdomain'); ?>
        
    </h4>
    <hr />
    <ul class="subsubsub">
        <li class="all">
            all
        </li>
    </ul>
<?php
}

function manage_options_combine()
{
?>
    <div>
        Manage Options
    </div>
<?php
}
