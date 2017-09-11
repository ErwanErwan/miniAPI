<?php
Namespace MiniMVC\Controller;

use MiniMVC\HTTP\Response;
use MiniMVC\HTTP\Request;


class Controller
{

	protected $request;

	public function __construct(){
		$this->request = new Request;
	}

	protected function response($body, $status = 200){

		$response = new Response($body, $status);
		$response->setHeader('Content-Type', 'text/html');
		return $response;
	}

}