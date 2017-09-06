<?php
Namespace App\Repositories;

use MiniMVC\DB\Repository;
use PDO;
/**
* 
*/
class FavoriteRepository extends Repository
{
	
	public function __construct(){
		parent::__construct();
		$this->tbl_name = 'user_song';
	}

	public function findBy($key, $value){

		$preped = $this->db->prepare('SELECT * FROM '. $this->tbl_name .' WHERE `'. $key .'`=:val');
		$preped->execute([':val' => $value]);
		$models = $preped->fetchAll(PDO::FETCH_OBJ);
		return $models;

	}
}