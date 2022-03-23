<?php
namespace Core;

/**
* Router
* php version 8.0
*/

class Router
{
	/**
	* associative array of routes
	*@var array
	*/
	protected $routes=[];
	/**
	* Add route to routing table
	* @param string $route the route url
	* @param array params parameters (controllers, actions, etc)
	*/
	public function add($route,$params=[])
	{
		// Convert the route to a regular expression: escape forward slashes
        $route = preg_replace('/\//', '\\/', $route);

        // Convert variables e.g. {controller}
        $route = preg_replace('/\{([a-z]+)\}/', '(?P<\1>[a-z-]+)', $route);

        // Convert variables with custom regular expressions e.g. {id:\d+}
        $route = preg_replace('/\{([a-z]+):([^\}]+)\}/', '(?P<\1>\2)', $route);

        // Add start and end delimiters, and case insensitive flag
        $route = '/^' . $route . '$/i'; 
		$this->routes[$route] = $params;

	}
	public function dispatch($url)
	{   
		if($this->match($url)){
			$controller = $this->params['controller'];
			$controller = $this->convertToStudlyCaps($controller);
			$controller= "App\Controllers\\$controller";

			if(class_exists($controller)){
				$controller_object = new $controller();
				$action   = $this->params['action'];
				$action    = $this->convertToCamelCase($action);

				if(is_callable([$controller_object,$action])){
					$controller_object->$action();
				}else{
					echo "Method $action in controller  $controller not found";
				}
			}else{
				echo "Controller class  $controller not found";
		
			}
		}else{
			echo "No route found";
		}
	}
	protected function convertToStudlyCaps($string)
	{
		return str_replace(' ','',ucwords(str_ireplace('-',' ',$string)));
	}

	protected function convertToCamelCase($string)
	{
		return lcfirst($this->convertToStudlyCaps($string));
	}
	/*
	* Get all routes
	* @return array
	*/
	public function getRoutes()
	{
		return $this->routes;
	}
	public function match($url)
	{


		foreach ($this->routes as $route => $params) {
            if (preg_match($route, $url, $matches)) {
                // Get named capture group values
                foreach ($matches as $key => $match) {
                    if (is_string($key)) {
                        $params[$key] = $match;
                    }
                }

                $this->params = $params;
                return true;
            }
        }

        return false;
	}
}
