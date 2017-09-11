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
	
	public function get($id){

		if($id === null)
			$data = $this->songRepo->findAll();
		else
			$data = $this->songRepo->find($id);
		return $this->jsonResponse($data, 200);

	}
	
}