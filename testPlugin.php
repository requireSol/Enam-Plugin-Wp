<?php
/**
 * Plugin Name:       testPlugin
 * Description:       This is my first Plugin
 * Version:           1.0.0
 * Author:            requireSol
 * Author URI:        https://enam.ior
 * Text Domain:       requireSol
 */
 
/*
 * Plugin constants
 */
if(!defined('TESTPLUGIN_URL'))
	define('TESTPLUGIN_URL', plugin_dir_url( __FILE__ ));
if(!defined('TESTPLUGIN_PATH'))
	define('TESTPLUGIN_PATH', plugin_dir_path( __FILE__ ));

class TestPlugin
{
    public function __construct()
    {
 
    }
 
}
 
/*
 * Starts our plugin class.
 */
new Feedier();