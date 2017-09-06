<?php
Namespace App\Controllers;

use MiniMVC\Controller\ApiController;
use MiniMVC\DB\DB;
use App\Repositories\favoriteRepository;
/**
* 
*/
class favoriteController  extends ApiController
{
	
	function __construct()
	{
		$this->favoriteRepo = new favoriteRepository;
	}

	public function get($id_user){
		$songs = $this->favoriteRepo->findBy('id_user', intval($id_user));
		var_dump($songs);
		die;
		return $this->jsonResponse($song, 200);
	}

	public function post($id_user){
		$song = $this->favoriteRepo->insert();
		// return $this->jsonResponse($song, 200);
	}

	public function delete($id_user, $id_song){
		$song = $this->favoriteRepo->delete();
		// return $this->jsonResponse($song, 200);
	}	
}