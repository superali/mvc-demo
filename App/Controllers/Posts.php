<?php
namespace App\Controllers;

/**
 * Posts controller
 * php version 8.0
 */

class Posts extends \Core\Controller
{   
    /**
     * Show index page
     * @return void
     */
    public function indexAction(){
        echo "heloo index post";
    }

        /**
     * Show Add new post page
     * @return void
     */
    public function addNewAction(){
        echo "heloo add new post";
    }
    protected function before(){echo " before";}
    protected function after(){echo " after";}
}