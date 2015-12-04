<?php
namespace Application;

use Application\Options\Options;
use Utils\Interfaces\OptionsAwareInterface;

class Module
{
    public function __construct($router)
    {
//         $option = \Utils\Model\Options::getInstance();
//         $options = new Options();
//         $option->Rewrite($router, $options);
        
        
        $classname = $router['module'].'\\Controller\\'.
                     $router['controller'];
        $actionname = $router['action'].'Action';
        
        /**
         * Dependence Injection by construct
         */
        /*
        $user = new $classname($router, $options);
        $user->$actionname();
        */
        
        /**
         * Dependence injection by get/set
         * @var Ambiguous $user
         */
        /*
        $user = new $classname();
        $user->setRouter($router);
        $user->$actionname();
        */
        
        $user = new $classname();
        if($user instanceof OptionsAwareInterface)
        {
            $user->setRouter($router);
            $user->setOptions(new Options());
        }
        
        
        $user->$actionname();
        
        
    }
    
    public function setDependencies()
    {
        array (
            'Options'        => ['Utils\Model\Router'],
            'UserController' => ['Options', 'Utils\Model\Router']
        );
    }
    
}