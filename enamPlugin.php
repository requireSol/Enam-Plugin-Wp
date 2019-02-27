<?php
/*
Plugin Name: EnamPlugin
Plugin URI: https://enam.io
Description: This is my first Plugin on Wordpress. Inspiration: https://github.com/Alecaddd/WordPressPlugin101
Version: 0.0.1 Alpha
Author: Enam Solaimani
Author URI: https://enam.io
License: GPLv2 or later
Text Domain: enam
*/

/*
 * Plugin constants Path / Secure Plugin DEFAULT ABS
 */
defined( 'ABSPATH' ) or die("FAIL");


if( file_exists(dirname(__FILE__) . '/vendor/autoload.php')){
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}
use src;

/**
 * The code that runs during plugin activation
 */
function activate_enamPlugin() {
    src\controller\Activate::activate();
}
register_activation_hook( __FILE__, 'activate_enamPlugin' );
/**
 * The code that runs during plugin deactivation
 */
function deactivate_enamPlugin() {
    src\controller\Deactivate::deactivate();
}
register_deactivation_hook( __FILE__, 'deactivate_enamPlugin' );
/**
 * Initialize all the core classes of the plugin
 */
if ( class_exists( 'src\\Init' ) ) {
    src\Init::register_services();
}