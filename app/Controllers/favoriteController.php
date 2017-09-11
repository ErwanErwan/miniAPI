<?php
Namespace App\Controllers;

use MiniMVC\Controller\ApiController;
use MiniMVC\Validator\Validator;
use MiniMVC\DB\DB;
use App\Repositories\favoriteRepository;
use App\Repositories\songRepository;



class favoriteController  extends ApiController
{
	
	function __construct()
	{
		parent::__construct();
		$this->favoriteRepo = new favoriteRepository;
	}

	public function get($id_user){
		$songRepo = new songRepository;

		$songs = $this->favoriteRepo->findByUserId(intval($id_user));
		$song_ids = array_map(create_function('$o', 'return intval($o->id_song);'), $songs);
		$songlist = $songRepo->findMany($song_ids);
		return $this->jsonResponse($songlist, 200);
	}

	public function create($id_user){

		$rules = [
			'id_user' => 'required|integer', 
			'id_song' => 'required|integer'
		];
		$v = new Validator($rules);

		$id_song = $this->request->getParam('id_song');
		$bool = $v->validate(['id_user' => $id_user, 'id_song' => $id_song]);
		
		if(!$bool)
			return $this->jsonResponse($v->getErrors(), 400);
		$inserted = $this->favoriteRepo->insert($id_user, $id_song);
		return $this->jsonResponse($inserted, 200);
	}

	public function delete($id_user, $id_song){

		$rules = [
			'id_user' => 'required|integer',
			'id_song' => 'required|integer'
		];
		$v = new Validator($rules);
		$bool = $v->validate(['id_user' => $id_user, 'id_song' => $id_song]);
		if(!$bool)
			return $this->jsonResponse($v->getErrors(), 400);
		$deleted = $this->favoriteRepo->delete($id_user, $id_song);
		return $this->jsonResponse($deleted, 200);
	}
}