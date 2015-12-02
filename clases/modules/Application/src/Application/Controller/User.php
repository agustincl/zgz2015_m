<?php
namespace Application\Controller;

use Application\Options\Options;
use Application\Mapper\UserMapper;
use Utils;
use Utils\View;

class User
{
    private $router;
    public $layout = 'dashboard';
    public $content;
    
    public function __construct($router)
    {
        $this->router = $router;    
    }
    
    public function indexAction()
    {        
        $option = Utils\Model\Options::getInstance();
        $options = new Options();
        $option->Rewrite($this->router, $options);
        
        $userMapper = new UserMapper();
        $rows = $userMapper->GetUsers($options);        
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