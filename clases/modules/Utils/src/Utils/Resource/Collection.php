<?php
namespace Utils\Resource;

abstract class Collection
{
    public function hydrate($entityname, $data)
    {        
        
        foreach ($data as $key => $user)
        {
            $entity = new $entityname();
            $entity = $entity->hydrate($user);            
            $this->$key = $entity;   
        } 
        return $this;
    }
    
    
}