<?php
namespace Application\Gateway;

class MysqlGateway
{
    private $options;
    
    public function __construct($options)
    {
        $this->options = $options;
    }
    
    public function getAll($table)
    {
        $query = "SELECT * FROM ".$table;
        $adaptername = '\\Utils\\Adapter\\'.$this->options->adapter.'Adapter';
        $adapter = new $adaptername($this->options->slave);
        $rows = $adapter->Select($query);
        return $rows;
    }
    public function getOne(){}
    public function insert(){}
    public function delete(){}
    public function update(){}
    
    public function queryRara()
    {
        $query ="SELECT con JOIN y COSAS";
    }
    
    
    
    
}