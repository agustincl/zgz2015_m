<?php

use Utils;
require ('../autoload.php');

$config = require '../config/config.php';
$router = Utils\Model\Router::route($_SERVER['REQUEST_URI'], $config);

Utils\Model\Dispatch::run($router);


