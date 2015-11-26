<?php

function DeleteUser($config, $id)
{
    $rows = array();
    switch($config['adapter'])
    {
        case 'Mysql':
            include('../modules/Application/src/Application/Model/Mysql/connect.php');
            include('../modules/Application/src/Application/Model/Mysql/Execute.php');
            $link = Connect($config['slave']);
            $query = "DELETE FROM user WHERE iduser=".$id;
//             echo $query;
//             die;
            $rows = Execute($link, $query);
            break;
        case 'Txt':
            include('../modules/Application/src/Application/Model/Txt/Delete.php');
            $rows = Delete($id, $config['userfilename']);
            break;
    }
    
    return $rows[0];
}