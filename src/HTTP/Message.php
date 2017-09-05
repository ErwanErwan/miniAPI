<?php
Namespace MiniMVC\HTTP;

class Message {

	private $method;
	private $uri;
	private $protocol;

	public function __construct(){

		$this->method = $_SERVER['REQUEST_METHOD'];
		$this->protocol = $_SERVER['SERVER_PROTOCOL'];		
		$this->uri = $_SERVER['REQUEST_URI'];
	}

	public function getMethod(){
		return $this->method;
	}
	public function getUri(){
		return $this->uri;
	}
	public function getProtocol(){
		return $this->protocol;
	}
}