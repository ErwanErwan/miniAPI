<?php
Namespace App\Controllers;

use MiniMVC\Controller\ApiController;
use MiniMVC\DB\DB;
use App\Repositories\userRepository;
/**
* 
*/
class userController extends ApiController
{

	private $userRepo;

	function __construct(){
		$this->userRepo = new userRepository;
	} 

	public function get($id){

		if($id === null){
			$data = $this->userRepo->findAll();
		} else {
			$data = $this->userRepo->find($id);
		}
		return $this->jsonResponse($data, 200);

	}
}