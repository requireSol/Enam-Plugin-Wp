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
use src\core\callbacks\AdminCallbacks;

class Admin extends BaseController
{

    public $settings;
    public $callbacks;
    public $pages = array();
    public $subpages = array();
    public function register()
    {
        $this->settings = new Settings();
        $this->callbacks = new AdminCallbacks();
        $this->setPages();
        $this->setSubpages();
        $this->settings->addPages( $this->pages )->withSubPage( 'Dashboard' )->addSubPages( $this->subpages )->register();
    }
    public function setPages()
    {
        $this->pages = array(
            array(
                'page_title' => 'Enam Plugin',
                'menu_title' => 'Enam',
                'capability' => 'manage_options',
                'menu_slug' => 'enamPlugin',
                'callback' => array( $this->callbacks, 'adminDashboard' ),
                'icon_url' => 'dashicons-store',
                'position' => 110
            )
        );
    }
    public function setSubpages()
    {
        $this->subpages = array(
            array(
                'parent_slug' => 'enamPlugin',
                'page_title' => 'Custom Post Type',
                'menu_title' => 'CPT',
                'capability' => 'manage_options',
                'menu_slug' => 'enamCpt',
                'callback' => array( $this->callbacks, 'adminCpt' )
            ),
            array(
                'parent_slug' => 'enamPlugin',
                'page_title' => 'Custom Taxonomies',
                'menu_title' => 'Taxonomies',
                'capability' => 'manage_options',
                'menu_slug' => 'enamTaxonomies',
                'callback' => array( $this->callbacks, 'adminTaxonomy' )
            ),
            array(
                'parent_slug' => 'enamPlugin',
                'page_title' => 'Custom Widgets',
                'menu_title' => 'Widgets',
                'capability' => 'manage_options',
                'menu_slug' => 'enamWidgets',
                'callback' => array( $this->callbacks, 'adminWidget' )
            )
        );
    }


}