<?php
namespace Utils\Traits;

trait OptionsTrait
{

    public $options;
    private $router;
    /**
     * @return the $router
     */
    public function getRouter()
    {
        return $this->router;
    }

    /**
     * @return the $options
     */
    public function getOptions($options)
    {
       if(isset($this->options))
           return $this->options;
       else
           return $this->setOptions($options);
        
    }

    /**
     * @param field_type $router
     */
    public function setRouter($router)
    {
        $this->router = $router;
    }

    /**
     * @param field_type $options
     */
    public function setOptions($options)
    {
        $option = \Utils\Model\Options::getInstance();
        
        $option->Rewrite($this->getRouter(), $options);
        
        $this->options = $options;
        return $this->options;
    }
}