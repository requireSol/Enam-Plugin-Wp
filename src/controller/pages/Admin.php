<?php
/**
 * Created by PhpStorm.
 * User: esolaimani
 * Date: 27.02.2019
 * Time: 23:00
 */

namespace src\controller\pages;
use src\controller\BaseController;
use src\core\Settings;

class Admin extends BaseController
{
    public $settings;
    public $pages = array();
    public function __construct()
    {
        $this->settings = new Settings();
        $this->pages = [
            [
                'page_title' => 'Enam Plugin',
                'menu_title' => 'Enam',
                'capability' => 'manage_options',
                'menu_slug' => 'enamPlugin',        //Try to use view here
                'callback' => function() { echo '<h1>Enam Plugin</h1>'; },
                'icon_url' => 'dashicons-store',
                'position' => 110
            ]/*,   #you can add many admin Pages on menu bar and different content
            [
                'page_title' => 'Enam Plugin',
                'menu_title' => 'Enam2',
                'capability' => 'manage_options',
                'menu_slug' => 'enamPlugin',
                'callback' => function() { echo '<h1>Enam Plugin</h1>'; },
                'icon_url' => 'dashicons-store',
                'position' => 110
            ]*/
        ];
    }
    public function register()
    {
        $this->settings->addPages( $this->pages )->register();
    }
}