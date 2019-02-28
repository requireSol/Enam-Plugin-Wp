<?php
/**
 * Created by PhpStorm.
 * User: esolaimani
 * Date: 27.02.2019
 * Time: 22:54
 */

namespace src\controller;
/**
 * Class Deactivate
 * @package src\controller
 */
class Deactivate
{
    /**
     *
     */
    public static function deactivate() {
        flush_rewrite_rules();
    }
}