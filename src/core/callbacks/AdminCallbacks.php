<?php
/**
 * Created by PhpStorm.
 * User: esolaimani
 * Date: 28.02.2019
 * Time: 01:18
 */

namespace src\core\callbacks;

use src\controller\BaseController;

class AdminCallbacks extends BaseController
{
    public function adminDashboard()
    {
        return require_once( $this->plugin_path . "src/view/admin.php" );
    }
    public function adminCpt()
    {
        return require_once( $this->plugin_path . "src/view/cpt.php" );
    }
    public function adminTaxonomy()
    {
        return require_once( $this->plugin_path . "src/view/taxonomy.php" );
    }
    public function adminWidget()
    {
        return require_once( $this->plugin_path . "src/view/widget.php" );
    }
}