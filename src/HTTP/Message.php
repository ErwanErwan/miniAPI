<?php
Namespace MiniMVC\HTTP;

class Message {

	private $uri;
	private $protocol;
	private $body;

	function __construct(){

		$this->protocol = $_SERVER['SERVER_PROTOCOL'];		
		$this->uri = $_SERVER['REQUEST_URI'];
	}
	
	public function getUri(){
		return $this->uri;
	}
	public function getProtocol(){
		return $this->protocol;
	}

	/*
		the header value is overriden if already present
	*/
	public function setHeader($name, $value){
		header($name .': ' . $value);
	}

	/*override all header that already exists, leave others as they are*/
	public function setHeaders($hash){}
	public function getHeader($name){}
	public function getHeaders(){}
}