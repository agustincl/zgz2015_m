<?php

chdir('..');
define('APPLICATION_PATH', getcwd());


require ('autoload.php');

$configarray = require '/config/config.php';


// $config = new Utils\Model\Config();
// $config->Rewrite($configarray);

$config = Utils\Model\Config::getInstance();
$config->Rewrite($configarray);

// echo "<pre>";
// print_r($config);
// echo "</pre>";


// $options = new Application\Options\Options();

// echo "<pre>";
// print_r($options);
// echo "</pre>";

// die;

$router = Utils\Model\Router::route($_SERVER['REQUEST_URI'], $config);

Utils\Model\Dispatch::run($router);


