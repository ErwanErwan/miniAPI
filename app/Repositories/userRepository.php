<?php 
Namespace App\Repositories;

use MiniMVC\DB\Repository;

class userRepository extends Repository
{

	public function __construct(){
		parent::__construct();
		$this->tbl_name = 'user';
	}

}