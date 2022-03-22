<?php

/**
*
* main controller
* php version 8.0
*/

require '../Core/Router.php';
echo 'Requested url="'.$_SERVER["QUERY_STRING"].'"';
$router = new Router();
$router->add('',['controller'=>'Home','action'=>'index']);
var_dump($router->getRoutes());
