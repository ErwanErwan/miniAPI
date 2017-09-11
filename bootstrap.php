<?php

// in order to make the PDO::quote function working (http://php.net/manual/fr/pdo.quote.php)
ini_set('default_charset', 'utf-8');

require_once "src/Autoloader/Psr4Autoloader.php";

$loader = new Psr4AutoloaderClass;
$loader->register();
$loader->addNamespace('MiniMVC', __DIR__ . DIRECTORY_SEPARATOR . 'src');
$loader->addNamespace('App', __DIR__ . DIRECTORY_SEPARATOR . 'app');