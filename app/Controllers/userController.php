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

	public function index(){

		$users = $this->userRepo->findAll();
		return $this->jsonResponse($users, 200);

	}
	public function get($id){

		$user = $this->userRepo->find($id);
		return $this->jsonResponse($user, 200);

	}
	// public function create(){}
	// public function update(){}
	// public function delete(){}
}