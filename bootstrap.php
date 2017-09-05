<?php
require_once "src/Autoloader/Psr4Autoloader.php";

$loader = new Psr4AutoloaderClass;

$loader->register();
$loader->addNamespace('MiniMVC', __DIR__ . DIRECTORY_SEPARATOR . 'src');
$loader->addNamespace('App', __DIR__ . DIRECTORY_SEPARATOR . 'app');

