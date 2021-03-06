<?php
/**
 * Created by PhpStorm.
 * User: Enam Solaimani
 * Date: 23.02.2019
 * Time: 19:19
 */

namespace src;
use src\controller;

final class Init
{
    /**
     * Store all the classes inside an array
     * @return array Full list of classes
     */
    public static function get_services()
    {
        return [
            controller\pages\Admin::class,
            controller\pages\Enqueue::class,
            controller\pages\SettingsLinks::class
        ];
    }
    /**
     * Loop through the classes, initialize them,
     * and call the register() method if it exists
     */
    public static function register_services()
    {
        foreach ( self::get_services() as $class ) {
            $service = self::instantiate( $class );
            if ( method_exists( $service, 'register' ) ) {
                $service->register();
            }
        }
    }
    /**
     * Initialize the class
     * @param  class $class    class from the services array
     * @return class instance  new instance of the class
     */
    private static function instantiate( $class )
    {
        $service = new $class();
        return $service;
    }
}
