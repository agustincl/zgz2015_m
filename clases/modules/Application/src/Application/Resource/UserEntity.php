<?php
namespace Application\Resource;

use Utils\Resource\Entity;

class UserEntity extends Entity
{
    public $iduser;
    public $name;
    public $email;
    private $password;
    public $photo;
    public $description;
    public $bdate;
    public $city_idcity;
    public $gender_idgender;
    
    /**
     * @return the $password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param field_type $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    
    
}