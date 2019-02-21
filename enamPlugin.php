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
 * Plugin constants Path / Secure Plugin
 */
defined( 'ABSPATH' ) or die("FAIL");

/**
 * Class EnamPlugin
 */
class EnamPlugin
{
    /**
     * EnamPlugin.
     */
    public function __construct()
    {
        //Add Plugin to Admin Menu Bar
        add_action( 'init', array( $this, 'registerPluginMenuItem' ) );
    }

    function activate() {
        // generated a Custom Post Type
        $this->registerPluginMenuItem();
        // flush rewrite rules
        flush_rewrite_rules();
    }
    function deactivate() {
        // flush rewrite rules
        flush_rewrite_rules();
    }

    function uninstall() {
        // delete Custom Post Type

        // delete all the plugin data from the DB
    }

    function registerPluginMenuItem() {
        register_post_type( 'enam', array( 'public' => true, 'label' => 'Enam' ) );
    }
 
}
/*
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
