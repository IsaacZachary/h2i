<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class WpCategorySortActivate {
    
    public static function activate() {

        global $wpdb;
        
        //check if the term_order column exists;
        $query = "SHOW COLUMNS FROM $wpdb->terms LIKE 'term_order'";
        $result = $wpdb->query($query);
        
        if ($result == 0)
            {
                $query = "ALTER TABLE $wpdb->terms ADD `term_order` INT( 4 ) NULL DEFAULT '0'";
                $result = $wpdb->query($query); 
            }

    }    
}