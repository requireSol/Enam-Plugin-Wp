<?php
/**
 * Created by PhpStorm.
 * User: esolaimani
 * Date: 28.02.2019
 * Time: 00:13
 */

namespace src\controller;


class SettingsLinks extends BaseController
{

    public function register()
    {
        add_filter( "plugin_action_links_$this->plugin", array( $this, 'settings_link' ) );
    }
    public function settings_link( $links )
    {
        $settings_link = '<a href="Init.php?page=enamPlugin">Settings</a>';
        array_push( $links, $settings_link );
        return $links;
    }
}