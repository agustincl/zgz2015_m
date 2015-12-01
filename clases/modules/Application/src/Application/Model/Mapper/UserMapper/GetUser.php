<?php


function GetUser($config, $id)
{
    $rows = array();
    switch($config['adapter'])
    {
        case 'Mysql':
            include('../modules/Application/src/Application/Model/Mysql/connect.php');
            include('../modules/Application/src/Application/Model/Mysql/Select.php');
            $link = Connect($config['slave']);
            $query = "SELECT * FROM user WHERE iduser=".$id;
//             echo $query;
            $rows = Select($link, $query);
            break;
        case 'Txt':            
            include('../modules/Application/src/Application/Model/Txt/SelectOne.php');
            $rows = SelectOne($config['userfilename'], $id);
            break;
    }
    
    return $rows[0];
}