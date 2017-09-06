<?php
Namespace MiniMVC\HTTP;

class Response extends Message
{

	private $status;
	private $body;
	private $headers;

	public function __construct($body, $status){
		parent::__construct();
		$this->body = $body;
		$this->setStatus($status);
	}

	public function send(){
		echo $this->body;
		ob_flush();
	}

	public function getStatus(){
		return http_response_code();
	}
	public function setStatus($code){
		http_response_code(intval($code));
	}

	public function getBody(){
		return $this->body;
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
