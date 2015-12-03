<?php

chdir('..');
define('APPLICATION_PATH', getcwd());

require ('autoload.php');

$configarray = require '/config/config.php';
$config = Utils\Model\Config::getInstance();
$config->Rewrite($configarray);

$router = Utils\Model\Router::route($_SERVER['REQUEST_URI'], $config);

Utils\Model\Dispatch::run($router);


