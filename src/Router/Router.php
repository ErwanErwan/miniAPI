<?php 
Namespace MiniMVC\Router;

class Router
{

	public static function get($uri, $controller, $action = 'index'){}
	public static function post(){}
	public static function put(){}
	public static function delete(){}

	public static function resolve($request){

		if(!isset($_GET['ressource']) || empty($_GET['ressource']))
			throw new \Exception("Error Processing Request", 1);

		$ressource = $_GET['ressource'];
		$ressourceId = isset($_GET['id']) ? intval($_GET['id']): 0;
		
		$controller = 'App\Controllers\\' . $ressource . 'Controller';
		
		if(!class_exists($controller))
			throw new \Exception("$ressource:Ressource not found", 2);

		switch ($request->getMethod()) {
			case 'GET':
			$action = ($ressourceId > 0 ? 'get': 'index');
			break;
			case 'PUT':
			$action = 'update';
			break;
			case 'POST':
			$action = 'create';
			break;
			case 'DELETE':
			$action = 'delete';
			break;
			default:
			throw new \Exception("Unhandled HTTP method", 3);
			break;
		}

		return [$controller, $action, $ressourceId];
	}



}