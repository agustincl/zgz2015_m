<?php
namespace Utils\Model;


class Dispatch
{
    static public function run($router)
    {
        $classname = $router['module'].'\\Controller\\'.$router['controller'];
        $actionname = $router['action'].'Action';
        $user = new $classname($router);
        $user->$actionname();
    }
}

