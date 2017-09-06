<?php
Namespace MiniMVC\DB;

use MiniMVC\DB\DB;
use PDO;
/**
* 
*/
abstract class Repository
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
	function findAll(){
		$preped = $this->db->prepare('SELECT * FROM ' . $this->tbl_name);
		$bool = $preped->execute();
		$models = $preped->fetchAll(PDO::FETCH_OBJ);
		return $models;
	}
	/*function insert($keyvalue){
		$keys = '';
		foreach ($keyvalue as $key => $value) {
			$keys .= ':' . $key . ',';
		}
		echo $keys;die;
		$preped = $this->db->prepare('INSERT INTO ' . $this->tbl_name . '()');

	}*/
	function update(){}
	function delete(){}

}