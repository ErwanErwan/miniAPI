<?php
Namespace MiniMVC\DB;

use PDO;
use PDOException;
use Exception;

use MiniMVC\Config\Config;


class DB
{

	private static $instance;
	private $dbh;

	private function __construct($dsn, $user, $password)
	{
		try {
			$this->dbh = new PDO($dsn, $user, $password);
		} catch (PDOException $e) {
			throw new Exception($e->getMessage(), 1);
		}
	}

	public function quote($str){
		return $this->dbh->quote($str);
	}

	public static function getInstance(){
		if(!isset(self::$instance)){
			$dbconfig = Config::instance('config/app.php')->get('database');

			$dsn = $dbconfig['driver'] . ':dbname=' . $dbconfig['dbname'] . ';host='. $dbconfig['host'];
			$user = $dbconfig['user'];
			$password = $dbconfig['password'];
			self::$instance = new self($dsn, $user, $password);
			return self::$instance;
		}
		return self::$instance;
	}

	public function prepare($query, $diveropts = []){
		return $this->dbh->prepare($query, $diveropts);
	}

	public function execute($prepared, $data = []){
		$prepared->execute($data);
		return $prepared->fetchAll(PDO::FETCH_OBJ);
	}


	public function insert($table){}
	public function select($table, $fields){}
	public function update(){}
	public function delete(){}
}