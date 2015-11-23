<?php

// echo "<pre>";
// print_r($_SERVER);
// echo "</pre>";

include("../modules/Utils/src/Utils/Model/Router.php");

$router = Router($_SERVER['REQUEST_URI']);

echo "<pre>";
print_r($router);
echo "</pre>";
    
        

switch($router['controller'])
{
    case 'user':
        include ("../modules/Application/src/Application/Controller/User.php");
    break;
        
}


