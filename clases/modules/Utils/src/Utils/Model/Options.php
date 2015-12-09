<?php
namespace Utils\Model;

class Options
{
    static $instance;
    
    private function __construct()
    {
        //echo "No se puede isntancias asi";
    }
    
    static public function getInstance()
    {
        if(self::$instance)
            return self::$instance;
        else 
        {
            self::$instance = new Options();
            return self::$instance;
        }
    }
    
    
    public function Rewrite($router, $optionsclass)
    {
        
        $optionsGlobal = APPLICATION_PATH.'/config/autoload/'.
                           strtolower($router['module']).'.global.php';
        
        $optionsLocal = APPLICATION_PATH.'/config/autoload/'.
                            strtolower($router['module']).'.local.php';
          
        $global = [];
        if(file_exists($optionsGlobal))
            $global = require_once $optionsGlobal;
        
        
        
        $local = [];
        if(file_exists($optionsLocal))
            $local = require_once $optionsLocal;
            
        $options = array_replace_recursive($global, $local);    
             
        if(!empty($options))
        foreach ($options as $key => $value) 
        {
            $optionsclass->$key = $options[$key];            
        }
//         return $optionsclass;
    }
}
 