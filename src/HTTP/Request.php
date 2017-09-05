<?php
Namespace MiniMVC\HTTP;

class Request extends Message
{

	private $params;

	public function __construct(){
		parent::__construct();
		$this->params = $_POST;
	}

	public function getParams(){
		return $this->params;
	}

}
