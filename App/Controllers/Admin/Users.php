<?php

namespace App\Controllers\Admin;

/**
 * Users controller
 * php version 8.0
 */

class Users extends \Core\Controller
{   
    /**
     * Show index page
     * @return void
     */
    public function indexAction(){
        echo "heloo index users";
    }

    protected before(){echo " before";}
    protected after(){echo " after";}
}