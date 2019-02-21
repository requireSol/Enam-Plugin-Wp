<?php
/*
Plugin Name: EnamPlugin
Plugin URI: http://enam.io
Description: This is my first Plugin on Wordpress
Version: 1.0.0 Developing
Author: Enam Solaimani
Author URI: http://enam.io
License: GPLv2 or later
Text Domain: enam
*/

/*
 * Plugin constants Path / Secure Plugin DEFAULT ABS
 */
defined( 'ABSPATH' ) or die("FAIL");

/**
 * Class EnamPlugin
 * This is a main class simultaneously with Java
 * The Class will be started here as well hided from Php Doc
 * @author Enam Solaimani
 */
class EnamPlugin
{
    /**
     * EnamPlugin constructor.
     * Enam Plugin constructor will be fired on activation
     */
    public function __construct()
    {
        //Add Plugin to Admin Menu Bar
        add_action( 'init', array( $this, 'registerPluginMenuItem' ) );
    }


    /**
     * If plugin is turned on register the plugin to the admin page
     * Generated a Custom Post Type
     * Flush rewrite rules
     * @dependencies The Plugin will Register a Post Type with registerPluginMenuItem
     * @see registerPluginMenuItem()
     */
    function activate() {
        // generated a Custom Post Type / PostPlugin
        $this->registerPluginMenuItem();
        // flush rewrite rules
        flush_rewrite_rules();
    }

    /**
     * Flush rewrite rules and delete menu item
     * Flush rewrite rules
     * @dependencies The Plugin will Register a Post Type with registerPluginMenuItem
     * @see registerPluginMenuItem()
     */
    function deactivate() {
        //
        flush_rewrite_rules();
    }

    /**
     * Register Plugin with function register_post_type()
     * @dependencies registerPluginMenuItem use register_post_type() to Register the Plugin
     */
    function registerPluginMenuItem() {
        register_post_type( 'enam', array( 'public' => true, 'label' => 'Enam' ) );
    }
 
}
/**
 * Starts our plugin class.
 */
if ( class_exists( 'EnamPlugin' ) ) {
    $enamPlugin = new EnamPlugin();
}

// activation
register_activation_hook( __FILE__, array( $enamPlugin, 'activate' ) );

// deactivation
register_deactivation_hook( __FILE__, array( $enamPlugin, 'deactivate' ) );

// uninstall
