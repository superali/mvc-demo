<?php

/**
*
* main controller
* php version 8.0
*/
// require '../App/Controllers/Posts.php';
// require '../Core/Router.php';
// echo 'Requested url="'.$_SERVER["QUERY_STRING"].'"';

spl_autoload_register(function($class){
    $root =dirname(__DIR__);
    $file = $root.'/'.str_replace('\\','/',$class).'.php';
    if(is_readable($file)){
        require $root . '/'.str_replace('\\','/',$class).'.php';
    }
});

$router = new Core\Router();
$router->add('',['controller'=>'Home','action'=>'index']);
$router->add('{controller}/{action}');
$router->add('{controller}/{id:\d+}/{action}');
$router->dispatch($_SERVER["QUERY_STRING"]);



