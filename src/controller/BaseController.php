<?php
/**
 * Created by PhpStorm.
 * User: esolaimani
 * Date: 27.02.2019
 * Time: 22:52
 */


namespace src\controller;

/**
 * Class BaseController
 * @package src\controller
 */
class BaseController
{
    /**
     * @var
     */
    public $plugin_path;
    /**
     * @var
     */
    public $plugin_url;
    /**
     * @var string
     */
    public $plugin;


    public $managers = array();

    /**
     * BaseController constructor.
     */
    public function __construct() {
        $this->plugin_path = plugin_dir_path( dirname( __FILE__, 2 ) );
        $this->plugin_url = plugin_dir_url( dirname( __FILE__, 2 ) );
        $this->plugin = plugin_basename( dirname( __FILE__, 3 ) ) . '/enamPlugin.php';
        $this->managers = array(
            'cpt_manager' => 'CPT Manager',
            'tax_manager' => 'Taxonomy Manager',
            'media_widget' => 'Media Widget',
            'user_manager' => 'User Manager',
            'contact_manager' => 'Contact Manager'
        );
    }


}