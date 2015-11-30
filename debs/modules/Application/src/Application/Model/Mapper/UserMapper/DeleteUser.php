<?php

function DeleteUser($config, $id){
    $rows = array();
    switch($config['adapter']){
        case 'Mysql':
            include('../modules/Application/src/Application/Model/Mysql/Execute.php');
            include('../modules/Application/src/Application/Model/Mysql/Connect.php');
            $link = Connect($config['slave']);
            $query = "DELETE FROM user WHERE iduser=".$id;
            $rows = Execute($link, $query);
            break;
        case 'Txt':
            include('../modules/Application/src/Application/Model/Txt/Delete.php');
            $rows = Delete($id, $config['userfilename']);
            break;
    }
    
    return $rows;
}