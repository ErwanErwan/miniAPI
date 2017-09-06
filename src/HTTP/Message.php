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
}