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

    /**
     * BaseController constructor.
     */
    public function __construct() {
        $this->plugin_path = plugin_dir_path( dirname( __FILE__, 2 ) );
        $this->plugin_url = plugin_dir_url( dirname( __FILE__, 2 ) );
        $this->plugin = plugin_basename( dirname( __FILE__, 3 ) ) . '/enamPlugin.php';
    }
}