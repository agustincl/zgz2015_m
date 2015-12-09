<?php
namespace Utils\Interfaces;

interface OptionsAwareInterface
{
    public function setOptions($options);
    
    public function getOptions($options);
}