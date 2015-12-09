<?php
namespace Utils\Model;

class Config
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
            self::$instance = new Config();
            return self::$instance;
        }
    }
    
    
    public function Rewrite($configarray = null)
    {
        if(isset($configarray))
        foreach ($configarray as $key => $value) 
        {
            $this->$key = $configarray[$key];
            
        }
    }
}
 