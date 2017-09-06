<?php

Namespace App\Models;

use MiniMVC\DB\Model;

class User extends Model
{

	private $id;
	private $name;
	private $email;

	public function __construct($name, $email){
		$this->name = $name;
		$this->email = $email;
	}

	public function getName(){}
	public function setName(){}
	public function getEmail(){}
	public function setEmail(){}

}
