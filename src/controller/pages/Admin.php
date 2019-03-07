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
use src\core\callbacks\ManagerCallbacks;

/**
 * Class Admin
 * @package src\controller\pages
 */
class Admin extends BaseController
{

    /**
     * @var
     */
    public $settings;
    /**
     * @var
     */
    public $callbacks;
    /**
     * @var array
     */
    public $pages = array();
    /**
     * @var array
     */
    public $subpages = array();
    /**
     * @var array
     */
    public $callbacks_manager = array();


    /**
     *
     */
    public function register()
    {
        $this->settings = new Settings();
        $this->callbacks = new AdminCallbacks();
        $this->callbacks_manager = new ManagerCallbacks();
        $this->setPages();
        $this->setSubpages();
        $this->setSettings();
        $this->setSections();
        $this->setFields();
        $this->settings->addPages($this->pages)->withSubPage('Dashboard')->addSubPages($this->subpages)->register();
    }

    /**
     *
     */
    public function setPages()
    {
        $this->pages = array(
            array(
                'page_title' => 'Enam Plugin',
                'menu_title' => 'Enam',
                'capability' => 'manage_options',
                'menu_slug' => 'enamPlugin',
                'callback' => array($this->callbacks, 'adminDashboard'),
                'icon_url' => 'dashicons-store',
                'position' => 110
            )
        );
    }

    /**
     *
     */
    public function setSubpages()
    {
        $this->subpages = array(
            array(
                'parent_slug' => 'enamPlugin',
                'page_title' => 'Custom Post Type',
                'menu_title' => 'CPT',
                'capability' => 'manage_options',
                'menu_slug' => 'enamCpt',
                'callback' => array($this->callbacks, 'adminCpt')
            ),
            array(
                'parent_slug' => 'enamPlugin',
                'page_title' => 'Custom Taxonomies',
                'menu_title' => 'Taxonomies',
                'capability' => 'manage_options',
                'menu_slug' => 'enamTaxonomies',
                'callback' => array($this->callbacks, 'adminTaxonomy')
            ),
            array(
                'parent_slug' => 'enamPlugin',
                'page_title' => 'Custom Widgets',
                'menu_title' => 'Widgets',
                'capability' => 'manage_options',
                'menu_slug' => 'enamWidgets',
                'callback' => array($this->callbacks, 'adminWidget')
            )
        );
    }

    public function setSettings()
    {
        $args = array();
        foreach ( $this->managers as $key => $value ) {
            $args[] = array(
                'option_group' => 'enamPluginSettings',
                'option_name' => $key,
                'callback' => array( $this->callbacks_manager, 'checkBox' )
            );
        }
        $this->settings->setSettings( $args );
    }

    public function setSections()
    {
        $args = array(
            array(
                'id' => 'enam_admin_index',
                'title' => 'Settings',
                'callback' => array($this->callbacks_manager, 'adminSectionManager'),
                'page' => 'enamPlugin'
            )
        );
        $this->settings->setSections($args);
    }

    public function setFields()
    {
        $args = array();
        foreach ( $this->managers as $key => $value ) {
            $args[] = array(
                'id' => $key,
                'title' => $value,
                'callback' => array( $this->callbacks_manager, 'checkBoxField' ),
                'page' => 'enamPlugin',
                'section' => 'enam_admin_index',
                'args' => array(
                    'label_for' => $key,
                    'class' => 'ui-toggle'
                )
            );
        }
        $this->settings->setFields( $args );
    }


}