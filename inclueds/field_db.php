<?php

function get_or_create_table()
{
    global $wpdb, $table_prefix;
    $table_name_field = $table_prefix . "combine_fields"; // wp_combine_fields
    $table_name_field_options = $table_prefix . "combine_field_options"; // wp_combine_field_options
    $charset_collate = $wpdb->get_charset_collate(); // UTF-8 or latin or more...

    if ($wpdb->get_var("show tables like '$table_name_field'") != $table_name_field) {
        $sql_query = "CREATE TABLE $table_name_field (
            id mediumint(10) NOT NULL AUTO_INCREMENT,
            field_name varchar(250),
            PRIMARY KEY  (id)
        ) $charset_collate;";
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql_query);
    }

    if ($wpdb->get_var("show tables like '$table_name_field_options'") != $table_name_field_options) {
        $sql_query = "CREATE TABLE $table_name_field_options (
            id mediumint(10) NOT NULL AUTO_INCREMENT,
            field_id mediumint(20) NOT NULL,
            label varchar(250),
            value varchar(100),
            PRIMARY KEY  (id),
            UNIQUE (field_id)
        ) $charset_collate;";
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql_query);
        $sql_query = "ALTER TABLE $table_name_field_options ADD FOREIGN KEY (`field_id`) REFERENCES $table_name_field(`id`) ON DELETE CASCADE ON UPDATE NO ACTION;";
        dbDelta($sql_query);
    }
}