<?php
namespace Utils\Model;


class Dispatch
{
    static public function run($router)
    {
        $modulename = $router['module'].'\\Module';
        $module = new $modulename($router);
        
    }
}

