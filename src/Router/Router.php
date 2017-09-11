<?php 
Namespace MiniMVC\Router;

class Router
{

	public static function resolve($request){
		$params = $_GET;
		if(!isset($_GET['ressource']) || empty($_GET['ressource']))
			throw new \Exception("Error Processing Request", 1);

		$ressource = $_GET['ressource'];
		unset($params['ressource']);
		$controller = 'App\Controllers\\' . $ressource . 'Controller';
		
		if(!class_exists($controller))
			throw new \Exception("$ressource:Ressource not found", 2);

		switch ($request->getMethod()) {
			case 'GET':
			$action = 'get';
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

		return [$controller, $action, $params];
	}



}