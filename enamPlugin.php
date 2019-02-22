<?php
/*
Plugin Name: EnamPlugin
Plugin URI: https://enam.io
Description: This is my first Plugin on Wordpress. Inspiration: https://github.com/Alecaddd/WordPressPlugin101
Version: 1.0.0 Developing
Author: Enam Solaimani
Author URI: https://enam.io
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
     * @author Enam Solaimani
     */
    public function __construct()
    {

    }
    /**
     * Add Plugin to Admin Menu Bar
     * @dependencies Init the Plugin with add-action
     */
    function initialise() {
        add_action( 'init', array( $this, 'registerPluginMenuItem' ) );
    }

    /**
     * Add scripts and stylesheets
     * @dependencies Add scripts and stylesheets with add-action
     */
    function register() {
        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' ) );
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
     */
    function deactivate() {
        flush_rewrite_rules();
    }

    /**
     * Register Plugin with function register_post_type()
     * @dependencies registerPluginMenuItem use register_post_type() to Register the Plugin
     */
    function registerPluginMenuItem() {
        register_post_type( 'enam', array( 'public' => true, 'label' => 'Enam' ) );
    }

    /**
     * Enqueue all our scripts and stylesheets
     * @dependencies The Plugin will Register a Post Type with registerPluginMenuItem
     */
    function enqueue() {
        wp_enqueue_style( 'pluginstyle', plugins_url( '/public/style.css', __FILE__ ) );
        wp_enqueue_script( 'pluginscript', plugins_url( '/public/script.js', __FILE__ ) );
    }
 
}

/**
 * Starts our plugin class.
 */
if ( class_exists( 'EnamPlugin' ) ) {
    $enamPlugin = new EnamPlugin();
    //register all scripts and stylesheets
    $enamPlugin->register();
    $enamPlugin->initialise();
}

// activation
register_activation_hook( __FILE__, array( $enamPlugin, 'activate' ) );

// deactivation
register_deactivation_hook( __FILE__, array( $enamPlugin, 'deactivate' ) );

// uninstall
