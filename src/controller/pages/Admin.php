<?php
/**
 * Created by PhpStorm.
 * User: esolaimani
 * Date: 27.02.2019
 * Time: 23:00
 */

namespace src\controller\pages;
use src\controller\BaseController;

class Admin extends BaseController
{
    public function register() {
        add_action( 'admin_menu', array( $this, 'add_admin_pages' ) );
    }
    public function add_admin_pages() {
        add_menu_page( 'Enam Plugin', 'Enam', 'manage_options', 'enamPlugin', array( $this, 'admin_index' ), 'dashicons-store', 110 );
    }
    public function admin_index() {
        require_once __FILE__ . '../view/admin.php';
    }
}