<?php

echo "<pre>";
print_r($_SERVER);
echo "</pre>";

if(isset($_GET['controller']))
    $controller=$_GET['controller'];
    else
        $controller = 'user';
    
switch($controller)
{
    case 'user':
        include ("../modules/Application/src/Application/Controller/UserController.php");
    break;
        
}


