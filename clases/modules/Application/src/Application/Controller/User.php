<?php
namespace Application\Controller;

use Application\Options\Options;

use Utils\View;
use Utils\Interfaces\OptionsAwareInterface;
use Utils\Traits\OptionsTrait;
use Application\Service\UserService;

class User implements OptionsAwareInterface
{
    use OptionsTrait;
    
    public $layout = 'dashboard';
    public $content;
        
    public function indexAction()
    {      
        $options = new Options();
        $options = $this->getOptions($options);        
        $userService = new UserService();
        $users = $userService->getUsers($options);  
        
//         echo "<pre>";
        header("Content-Type: application/json");
        print_r(json_encode($users));
//         echo "</pre>";
        die;
        $this->content = View::RenderView($this->router, 
                                          array('rows'=>$users));        
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
        
//         echo "<pre>";
//         print_r($this->content);
//         echo "</pre>";
        die;
        
        echo View::RenderLayout($this->router, 
                                 $this->layout, 
                                 $this->content);
    }
    
    
}