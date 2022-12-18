<?php
/*
Plugin Name: WP Category Sort
Plugin URI: https://wordpress.org/plugins/wp-category-sort/
Description: The WP Category Sort plugin allows you to easily reorder your categories the way you want via drag and drop. 
Version: 2.0.3
Author: Lovin Nagi
Author URI: https://profiles.wordpress.org/lovinnagi
Author Email: lovinnagi23@gmail.com
Text Domain: wpcatsort
Domain Path: /languages/ 
License:      GPL v2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/


// disable direct file access
if ( ! defined( 'ABSPATH' ) ) {
	
	exit;
	
}

// Define PATH and URL.
define('WPCATSORTPATH',    plugin_dir_path(__FILE__));
define('WPCATSORTURL',     plugins_url('', __FILE__));


if( ! class_exists( 'WPCategorySort' ) ) {
    
    class WPCategorySort {

        public function __construct() {

            // Load Dependencies
            $this->load_dependencies();
            
            //Actions
            add_action( 'plugins_loaded', array ( $this, 'wpcatsort_load_textdomain' ) );
            add_action( 'admin_enqueue_scripts', array( $this, 'wpcatsort_admin_scripts' ) );
            add_action( 'admin_print_styles', array( $this, 'wpcatsort_admin_styles' ) );
            add_action( 'admin_menu', array( $this, 'wpcatsort_admin_submenu' ) );
            add_action( 'wp_ajax_wpcatsort_updateajax', array( $this, 'wpcatsort_saveajax' ) );

            // Filters
            add_filter('get_terms_orderby', array( $this, 'wpcatsort_filter_apply' ), 10, 2);
        }

        public function activate() {

            require_once WPCATSORTPATH . '/inc/wp-category-sort-activate.php';
            WpCategorySortActivate::activate();

        }
        // load text domain
        public function wpcatsort_load_textdomain() {
            
            load_plugin_textdomain( 'wpcatsort', false, WPCATSORTPATH . 'languages/' );
            
        }
        // Include JS
        public function wpcatsort_admin_scripts() {
                    
            wp_enqueue_script('jquery');
            
            wp_enqueue_script('jquery-ui-sortable');
            
            $wpCategorySortScript = WPCATSORTURL . '/admin/js/wpcategorysort-script.js';


            wp_register_script( 'wpcategorysort-script', $wpCategorySortScript, array( 'jquery', 'jquery-ui-sortable' ), '2.0.0', true );
            wp_enqueue_script( 'wpcategorysort-script');
            wp_localize_script( 'wpcategorysort-script', 'wpcatsort_object', array(
                'ajax_url' => admin_url( 'admin-ajax.php' ),
                'ajax_updated_text' => __( 'Items Order Updated.', 'wpcatsort' ),
                /**
                 * Create nonce for security.
                 *
                 * @link https://codex.wordpress.org/Function_Reference/wp_create_nonce
                 */
                '_nonce' => wp_create_nonce( 'update-category-order' ),
        
            ) );

            
        }
        // Include Styles
        public function wpcatsort_admin_styles() {

            $wpCategorySortStyle = WPCATSORTURL . '/admin/css/wpcategorysort-style.css';
            wp_register_style( 'wpcategorysort-style', $wpCategorySortStyle, array(), '2.0.0', 'all' );
            wp_enqueue_style( 'wpcategorysort-style');
        }

        public function load_dependencies() {

            // include plugin dependencies: admin only
            if ( is_admin() ) {
                
                require_once WPCATSORTPATH . 'inc/wp-category-sort-walker.php';
                
            }
        }

        // Add Submenu to the Post Type
        public function wpcatsort_admin_submenu() {
            add_submenu_page( 
                'edit.php',
                esc_html__('Category Order', 'wp-taxonomy-post-ordering'),
                esc_html__('Category Order', 'wp-taxonomy-post-ordering'),
                'manage_options',
                'wpscatsort',
                array( $this, 'wpcatsort_admin_interface_page' ) 
            );
        }

        public function wpcatsort_admin_interface_page() {

            // check if user is allowed access
            if ( ! current_user_can( 'manage_options' ) ) return;
            
            require_once WPCATSORTPATH . 'admin/views/category-list.php';
        
        }

        // Save ajax request
        public function wpcatsort_saveajax() {
            global $wpdb; 

            if ( ! wp_verify_nonce( $_POST['_nonce'], 'update-category-order' ) )
            die();
            
            if ( ! current_user_can( 'manage_options' ) ) {
                die(esc_html__( 'You need a higher level of permission.', 'wpcatsort' ));
            }

            $data = stripslashes($_POST['order']);

            $unserialised_data  = json_decode($data, TRUE);
            if (is_array($unserialised_data))
            foreach($unserialised_data as $key => $values ) 
                {

                    $items = explode("&", $values);
                    unset($item);
                    foreach ($items as $item_key => $item_)
                        {
                            $items[sanitize_text_field( $item_key )] = trim( str_replace("item[]=", "", sanitize_text_field( $item_ )));
                        }
                    
                    if (is_array($items) && count($items) > 0)
                    foreach( $items as $item_key => $term_id ) 
                        {
                            $wpdb->update( $wpdb->terms, array('term_order' => ($item_key + 1)), array('term_id' => $term_id), array( '%d' ), array( '%d' ) )  ;
                        } 
                }
                
            do_action('wpcatsortaction/update-order');
                
            die();
        } 
        
        // @return term_order               
        function wpcatsort_filter_apply($orderby, $args) {

            return 't.term_order';

        }        
        
    }

    $wpCategorySort = new WPCategorySort;

    register_activation_hook( __FILE__, array ($wpCategorySort , 'activate' ) );
}