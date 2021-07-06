<?php

class Route
{
    private static $routes = Array();
	private static $errorRoutes;
	public static $pagesPath = '../view/pages/';

	public static function add($expression, $function, $method = 'get') {
	  	array_push(self::$routes, Array(
	  	  	'expression' => $expression,
	  	  	'function' => $function,
	  	  	'method' => $method
	  	));
	}

	public static function addRoute404( $function ) {
		self::$errorRoutes = $function;
  	}

    public static function run() {
        
		$parsed_url = parse_url($_SERVER['REQUEST_URI']);

		$path = isset($parsed_url['path'])? $parsed_url['path'] : '/';

		$method = $_SERVER['REQUEST_METHOD'];

		$route_match_found = false;

		foreach( self::$routes as $route ) {

		  	$route['expression'] = '^'.$route['expression'].'$';
			
		  	$rotaNaLista = preg_match('#'.$route['expression'].'#', $path, $matches);
		  
		  	if( $rotaNaLista ) {
				  
				if( strtolower($method) == strtolower($route['method']) ) {
					return $route['function'];

					$route_match_found = true;

	    	    	break;
				}
			}
		}

		if( !$route_match_found ) {
			return self::$errorRoutes;
	  	}
    }


}