<?php

/**
*
* main controller
* php version 8.0
*/


/**
 * Composer
 */
require '../vendor/autoload.php';


/**
 * Twig
 */
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$loader = new FilesystemLoader('../App/Views');
$twig = new Environment($loader);


// spl_autoload_register(function($class){
//     $root =dirname(__DIR__);
//     $file = $root.'/'.str_replace('\\','/',$class).'.php';
//     if(is_readable($file)){
//         require $root . '/'.str_replace('\\','/',$class).'.php';
//     }
// });

$router = new Core\Router();
$router->add('',['controller'=>'Home','action'=>'index']);
$router->add('{controller}/{action}');
$router->add('{controller}/{id:\d+}/{action}');
$router->add('admin/{controller}/{action}',['namespace' =>'Admin']);

$router->dispatch($_SERVER["QUERY_STRING"]);



