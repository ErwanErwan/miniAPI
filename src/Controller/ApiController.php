<?php
Namespace MiniMVC\Controller;

use MiniMVC\HTTP\Response;

class ApiController {

	protected function jsonResponse($body, $status = 200){

		$body = json_encode($body);
		$response = new Response($body, $status);
		$response->setHeader('Content-Type', 'application/json');
		return $response;
	}

}