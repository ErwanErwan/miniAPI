<?php 
Namespace MiniMVC\Router;

class Router
{

	private $uris;

	public static function get($uri, $controller, $action = 'index'){}
	public static function post(){}
	public static function put(){}
	public static function delete(){}

	public static function resolve($request){

		$uri = $request->getUri();
		$params = [];

		$query = parse_url($uri, PHP_URL_QUERY);
		parse_str($query, $params);
		
		$path = parse_url($uri, PHP_URL_PATH);
		$path_components = explode('/', trim($path, '/'));

		if(count($path_components) < 1 || (count($path_components) == 1 && $path_components[0] === $request->script_fname))
			throw new Exception("$path:ressource not found", 1);

		die;
		//return [$controller, $action, $queryparams];
	}



}