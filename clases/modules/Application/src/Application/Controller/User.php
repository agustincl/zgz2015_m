<?php
namespace Application\Controller;

use Application\Options\Options;
use Application\Mapper\UserMapper;
use Utils\View;
use Utils\Interfaces\OptionsAwareInterface;
use Utils\Traits\OptionsTrait;

class User implements OptionsAwareInterface
{
    use OptionsTrait;
    
    public $layout = 'dashboard';
    public $content;
        
    public function indexAction()
    {       
        $options = new Options();
        $userMapper = new UserMapper();
        $rows = $userMapper->GetUsers($this->getOptions($options));        
        $this->content = View::RenderView($this->router, 
                                          array('rows'=>$rows));        
    }
    public function selectAction()
    {
        echo "Select";
    }
    public function updateAction()
    {
        echo "Update";
    }
    public function deleteAction()
    {
        echo "Delete";
    }
    
    public function __destruct()
    {
        echo View::RenderLayout($this->router, 
                                 $this->layout, 
                                 $this->content);
    }
    
    
}