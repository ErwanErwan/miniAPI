<?php
Namespace MiniMVC\DB;

use MiniMVC\DB\DB;
use PDO;


class Repository
{
	protected $tbl_name;
	protected $db;

	function __construct(){
		$this->db = DB::getInstance();
	}

	function find($id){
		$preped = $this->db->prepare('SELECT * FROM '. $this->tbl_name .' WHERE id=:id');
		$bool = $preped->execute([':id' => $id]);
		$model = $preped->fetch(PDO::FETCH_OBJ);
		return $model;
	}
	function findMany($ids){

		$clause = implode(',', array_fill(0, count($ids), '?'));
		$preped = $this->db->prepare('SELECT * FROM '. $this->tbl_name .' WHERE `id` IN (' . $clause . ')');

		array_walk($ids, function($id, $key, &$preped){
			$preped->bindParam($key + 1, $id);
		}, $preped);

		$preped->execute();
		$models = $preped->fetchAll(PDO::FETCH_OBJ);
		return $models;
	}
	function findAll(){
		$preped = $this->db->prepare('SELECT * FROM ' . $this->tbl_name);
		$bool = $preped->execute();
		$models = $preped->fetchAll(PDO::FETCH_OBJ);
		return $models;
	}
	
}