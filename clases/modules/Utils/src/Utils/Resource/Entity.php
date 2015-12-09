<?php
namespace Utils\Resource;

abstract class Entity
{
    public function hydrate($data)
    {
        foreach ($this as $key => $value)
        {
            $this->$key = $data[$key];
        }
        return $this;
    }
}