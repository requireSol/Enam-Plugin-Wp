<?php
/**
 * Created by PhpStorm.
 * User: esolaimani
 * Date: 27.02.2019
 * Time: 22:52
 */

namespace src\controller;
/**
 * Class Activate
 * @package src\controller
 */
class Activate
{
    /**
     *
     */
    public static function activate() {
        flush_rewrite_rules();
    }
}