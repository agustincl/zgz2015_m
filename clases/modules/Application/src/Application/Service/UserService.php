<?php
namespace Application\Service;

use Application\Mapper\UserMapper;

class UserService
{
    public function getUsers($options)
    {
        
        
        $userMapper = new UserMapper();
        $rows = $userMapper->GetUsers($options);
        
        // Send Email
        
        return $rows;
    }
}