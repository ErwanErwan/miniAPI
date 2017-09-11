<?php
Namespace MiniMVC\Controller;

use MiniMVC\HTTP\Response;
use MiniMVC\HTTP\Request;


class ApiController extends Controller
{

	public function __construct(){
		parent::__construct();
	}

	protected function jsonResponse($body, $status = 200){

		$body = json_encode($body);
		$response = new Response($body, $status);
		$response->setHeader('Content-Type', 'application/json');
		return $response;
	}

}