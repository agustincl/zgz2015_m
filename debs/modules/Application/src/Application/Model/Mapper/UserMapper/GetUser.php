<?php
function GetUser($config, $id) {
    $rows = array();
    switch($config['adapter']) {
        case 'Mysql':
            include('../modules/Application/src/Application/Model/Mysql/connect.php');
            include('../modules/Application/src/Application/Model/Mysql/Select.php');
            $link = Connect($config['slave']);
            $query = "SELECT * FROM user WHERE iduser=".$id;
            $rows = Select($link, $query);
            return $rows[0];
            break;
        case 'Txt':            
            include('../modules/Application/src/Application/Model/Txt/SelectOne.php');
            $rows = SelectOne($config['userfilename'], $id);
            return $rows;
            break;
    }
}