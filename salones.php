<?php
/*
 * Plugin Name: Salones
 * Description: Un plugin para crear tipo de contenido para salones
 * Version: 1.0.0
 * Author: Sergio Triana Escobedo
 * Author URI: http://www.meKiero.com
 * Text Domain: salones
 */

if( !function_exists( 'add_action' ) ){
	die( "Hi there! I'm just a plugin, not much I can do when called directly." );
}

// Setup
define( 'SALONES_PLUGIN_URL', __FILE__ );

// Includes
include( 'includes/activate.php' );
include( 'includes/init.php' );
include( 'includes/admin/init.php' );
include( 'process/save-post.php' );
include( 'process/filter-content.php' );
include( 'includes/front/enqueue.php' );
include( 'process/rate-salones.php' );
include( 'includes/cron.php' );
include( 'includes/deactivate.php' );
include( 'includes/shortcodes/creator.php' );
include( 'process/submit-user-salones.php' );
include( 'includes/shortcodes/salones-auth.php' );
include( 'process/create-account.php' );
include( 'process/login.php' );

// Hooks
register_activation_hook( __FILE__, 'r_activate_plugin' );
register_deactivation_hook( __FILE__, 'r_deactivate_plugin' );
add_action( 'init', 'salones_init' );
add_action( 'admin_init', 'salones_admin_init' );
add_action( 'save_post_salones', 'r_save_post_admin', 10, 3 );
add_filter( 'the_content', 'r_filter_salones_content' );
add_action( 'wp_enqueue_scripts', 'r_enqueue_scripts', 100 );
add_action( 'wp_ajax_r_rate_salones', 'r_rate_salones' );
add_action( 'wp_ajax_nopriv_r_rate_salones', 'r_rate_salones' );
add_action( 'r_daily_salones_hook', 'r_generate_daily_salones' );
add_action( 'wp_ajax_r_submit_user_salones', 'r_submit_user_salones' );
add_action( 'wp_ajax_nopriv_r_submit_user_salones', 'r_submit_user_salones' );
add_action( 'wp_ajax_nopriv_salones_create_account', 'salones_create_account' );
add_action( 'wp_ajax_nopriv_salones_user_login', 'salones_user_login' );

// Shortcodes
add_shortcode( 'salones_creator', 'r_salones_creator_shortcode' );
add_shortcode( 'salones_auth_form', 'r_salones_auth_form_shortcode' );