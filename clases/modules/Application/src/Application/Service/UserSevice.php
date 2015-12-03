<?php
namespace Application\Service;

class UserService
{
    public function getUsers()
    {
        $userMapper = new UserMapper();
        $rows = $userMapper->GetUsers($this->getOptions($options));
        
        // Send Email
        
        return $rows;
    }
}