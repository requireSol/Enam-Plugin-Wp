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
class AdminCallbacks extends BaseController
{
    /**
     * @return mixed
     */
    public function adminDashboard()
    {
        return require_once( $this->plugin_path . "src/view/admin.php" );
    }

    /**
     * @return mixed
     */
    public function adminCpt()
    {
        return require_once( $this->plugin_path . "src/view/cpt.php" );
    }

    /**
     * @return mixed
     */
    public function adminTaxonomy()
    {
        return require_once( $this->plugin_path . "src/view/taxonomy.php" );
    }

    /**
     * @return mixed
     */
    public function adminWidget()
    {
        return require_once( $this->plugin_path . "src/view/widget.php" );
    }
}