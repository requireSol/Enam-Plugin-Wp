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

if( !class_exists('EnamPlugin')){

/**
 * Class EnamPlugin
 * This is a main class simultaneously with Java
 * The Class will be started here as well hided from Php Doc
 * @author Enam Solaimani
 */
class EnamPlugin
{
    /**
     * Plugin baseName will be declared for $plugin
     * @var string
     */
    public $plugin;
    /**
     * Enam Plugin constructor will be fired on activation
     * Add Plugin base name to $plugin object variable
     * @author Enam Solaimani
     */
    public function __construct()
    {
        $this->plugin = plugin_basename(__FILE__);
    }
    /**
     * Add Plugin to Admin Menu Bar
     * @dependencies Init the Plugin with add-action
     */
    public function initialise() {
        add_action( 'init', array( $this, 'registerPluginMenuItem' ) );
    }

    /**
     * Add scripts and stylesheets
     * Add a admin panel menu item for admin controll with UI
     * Add a setting on Plugin Menu
     * @dependencies Add scripts and stylesheets with add-action
     */
    public function register() {
        //Include Scripts and Styles
        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' ) );
        //Add a admin panel menu item for admin controll with UI
        add_action( 'admin_menu', array( $this, 'addAdminPage' ) ); //addAdminPage will be fired here
        //Add a setting on Plugin
        add_filter( "plugin_action_links_$this->plugin", array( $this, 'settings_link' ) ); //setting_link will be fired

    }

    /**
     * Set the settings Link wich will open the adin controll menubar item
     * @param $links
     * @return mixed
     */
    public function settings_link($links) {
        $settings_link = '<a href="admin.php?page=enamPlugin">Settings</a>';
        array_push( $links, $settings_link );
        return $links;
    }

    /**
     * Register admin page for enamPlugin
     */
    public function addAdminPage() {                                                                                                  //Function to declare index file//Plugin Icon//Placing of MenuBar Item
        add_menu_page( 'Enam Plugin', 'EnamPlugin', 'manage_options', 'enamPlugin', array( $this, 'admin_index' ), 'dashicons-store', 110 );
    }

    /**
     *  Include admin.php to show custom UI and content
     */
    public function admin_index() {
        require_once plugin_dir_path( __FILE__ ) . 'adminpanel/admin.php';
    }

    /**
     * If plugin is turned on register the plugin to the admin page
     * Generated a Custom Post Type
     * Flush rewrite rules
     * @dependencies The Plugin will Register a Post Type with registerPluginMenuItem
     * @see registerPluginMenuItem()
     */
    protected function activate() {
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
    protected function deactivate() {
        flush_rewrite_rules();
    }

    /**
     * Register Plugin with function register_post_type()
     * @dependencies registerPluginMenuItem use register_post_type() to Register the Plugin
     */
    public function registerPluginMenuItem() {
        register_post_type( 'enam', array( 'public' => true, 'label' => 'EnamPost' ) );
    }

    /**
     * Enqueue all our scripts and stylesheets
     * @dependencies The Plugin will Register a Post Type with registerPluginMenuItem
     */
    public function enqueue() {
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
    $enamPlugin->initialise();
    $enamPlugin->register();

}

// activation if you do this in static way Use $enamPlugin == "ClassName"
register_activation_hook( __FILE__, array( $enamPlugin, 'activate' ) );

// deactivation
register_deactivation_hook( __FILE__, array( $enamPlugin, 'deactivate' ) );

}