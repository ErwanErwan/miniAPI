<?php
Namespace App\Controllers;

use MiniMVC\Controller\ApiController;
use MiniMVC\DB\DB;
use App\Repositories\songRepository;
/**
* 
*/
class songController extends ApiController
{

	private $songRepo;

	function __construct(){
		$this->songRepo = new songRepository;
	} 

	public function index(){

		$songs = $this->songRepo->findAll();
		return $this->jsonResponse($songs, 200);

	}
	public function get($id){

		$song = $this->songRepo->find($id);
		return $this->jsonResponse($song, 200);

	}
	
}