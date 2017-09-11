<?php
Namespace App\Repositories;

use MiniMVC\DB\Repository;
use PDO;


class FavoriteRepository extends Repository
{
	
	public function __construct(){
		parent::__construct();
		$this->tbl_name = 'user_song';
	}

	public function findByUserId($id_user){

		$preped = $this->db->prepare('SELECT * FROM '. $this->tbl_name .' WHERE `id_user`=:val');
		$preped->execute([':val' => $id_user]);
		$models = $preped->fetchAll(PDO::FETCH_OBJ);
		return $models;

	}

	public function insert($id_user, $id_song){
		$preped = $this->db->prepare('INSERT INTO '. $this->tbl_name .' (id_user,id_song) VALUES (:iduser, :idsong)');
		$bool = $preped->execute([':iduser' => $id_user, ':idsong' => $id_song]);
		return $bool;
	}

	public function delete($id_user, $id_song){
		$preped = $this->db->prepare('DELETE FROM '. $this->tbl_name .' WHERE `id_user`=:iduser AND `id_song`=:idsong');
		$bool = $preped->execute([':iduser' => $id_user, ':idsong' => $id_song]);
		return $bool;	
	}
}