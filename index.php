<?php
require_once "bootstrap.php";
require_once "routes.php";

use MiniMVC\Router\Router;
use MiniMVC\HTTP\Request;
use MiniMVC\App;

try {

	$response = App::run();
	$response->send();

} catch (Exception $e) {
	echo $e->getMessage();
	exit;
}