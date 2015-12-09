<?php
namespace Utils\Adapter;

class MysqlAdapter
{
    private $link;
    
    public function __construct($config)
    {
        $this->link = $this->Connect($config);  
    }
    
    private function Connect($config)
    {
        $link = mysqli_connect($config['host'],
            $config['user'],
            $config['password']);
    
        mysqli_select_db($link, $config['database']);
    
        return $link;
    }
    
    public function Execute($query)
    {
        $result = mysqli_query($this->link, $query);
    
        return $result;
    }
    
    public function Select($query)
    {
        $result = mysqli_query($this->link, $query);
        while($row = mysqli_fetch_assoc($result))
        {
            $rows[]=$row;
        }
        return $rows;
    }
}