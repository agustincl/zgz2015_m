<?php


function GetUsers($config)
{
    $rows = array();
    switch($config['adapter'])
    {
        case 'Mysql':
            include('../modules/Application/src/Application/Model/Mysql/connect.php');
            include('../modules/Application/src/Application/Model/Mysql/Select.php');
            $link = Connect($config['slave']);
            $query = "SELECT * FROM user";
            $rows = Select($link, $query);
            break;
        case 'Txt':            
            include('../modules/Application/src/Application/Model/Txt/Select.php');
            $rows = Select($config['userfilename']);
            break;
    }
    
    return $rows;
}