<?php
Namespace MiniMVC\HTTP;

class Request extends Message
{

	private $params;
	private $method;

	public function __construct(){
		parent::__construct();
		$this->params = $_POST;
		$this->method = strtoupper($_SERVER['REQUEST_METHOD']);

	}

	public function getMethod(){
		return $this->method;
	}

	public function getParams(){
		return $this->params;
	}

}
