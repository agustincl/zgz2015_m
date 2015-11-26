<?php

include("../modules/Utils/src/Utils/Model/Router.php");

$config = require '../config/config.php';
$router = Router($_SERVER['REQUEST_URI'], $config);


include ("../modules/".$router['module']."/src/".
                       $router['module']."/Controller/".
                       $router['controller'].".php");



