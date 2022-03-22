<?php

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
	protected $routes=[]
	/**
	* Add route to routing table
	* @param string $route the route url
	* @param array params parameters (controllers, actions, etc)
	*/
	public function add($route,$params)
	{
		        // Convert the route to a regular expression: escape forward slashes
        $route = preg_replace('/\//', '\\/', $route);

        // Convert variables e.g. {controller}
        $route = preg_replace('/\{([a-z]+)\}/', '(?P<\1>[a-z-]+)', $route);

        // Convert variables with custom regular expressions e.g. {id:\d+}
        $route = preg_replace('/\{([a-z]+):([^\}]+)\}/', '(?P<\1>\2)', $route);

        // Add start and end delimiters, and case insensitive flag
        $route = '/^' . $route . '$/i'; 
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
		$reg_exp = "/^(?P<controller>[a-z-]+)\/(?P<action>[a-z-]+)$/";
		if(preg_match($reg_exp,$url,$matches))
		{
		$params=[];
		foreach($matches as $key=>$match)
		{
			if(is_string($key)){
				$params[$key]=$match;
			}
		}
		$this->params=$params;
		return true;
		}
	}
}
