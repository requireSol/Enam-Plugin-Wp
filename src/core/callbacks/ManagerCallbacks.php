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
        echo '<div class="' . $classes . '"><input type="checkbox" id="' . $name . '" name="' . $name . '" value="1" class="" ' . ($checkbox ? 'checked' : '') . '><label for="' . $name . '"><div></div></label></div>';
    }
}