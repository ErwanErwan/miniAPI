<?php
Namespace MiniMVC;

use MiniMVC\HTTP\Request;
use MiniMVC\Router\Router;
use App\Controllers;

class App
{

	public function run()
	{
		list($controller,$action, $params) = Router::resolve(new Request);
		$ctrl = new $controller;
		$response = call_user_func_array(array($ctrl, $action), $params);
		return $response;
	}
}