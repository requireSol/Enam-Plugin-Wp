<?php
/**
 * Created by PhpStorm.
 * User: esolaimani
 * Date: 28.02.2019
 * Time: 01:18
 */

namespace src\core\callbacks;

use src\controller\BaseController;

/**
 * Class AdminCallbacks
 * @package src\core\callbacks
 */
class ManagerCallbacks extends BaseController
{
    public function checkBox( $input )
    {
        return (isset($input) ? true : false);
    }

    public function checkboxField( $args )
    {
        $name = $args['label_for'];
        $classes = $args['class'];
        $checkbox = get_option( $name );
        echo '<input type="checkbox" name="' . $name . '" value="1" class="' . $classes . '" ' . ($checkbox ? 'checked' : '') . '>';
    }
}