<?php
Namespace MiniMVC\HTTP;

class Response extends Message
{

	private $status;

	public function getStatus(){
		return $this->status;
	}

}
