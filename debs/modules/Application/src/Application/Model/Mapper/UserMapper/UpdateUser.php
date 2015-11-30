<?php

function UpdateUser($config, $id, $data){
    $rows = array();
    switch($config['adapter']){
        case 'Mysql':
            include('../modules/Application/src/Application/Model/Mysql/Execute.php');
            include('../modules/Application/src/Application/Model/Mysql/Connect.php');
            $link = Connect($config['slave']);
            $query = "UPDATE user SET ";
            foreach ($data as $key=>$value){
                echo "<pre>key:";
                print_r($key);
                echo "</pre>";
                echo "<pre>value:";
                print_r($value);
                echo "</pre>";
            }
            die;
            $rows = Execute($link, $query);
            break;
        case 'Txt':
            include('../modules/Application/src/Application/Model/Txt/Delete.php');
            $rows = Update($id, $data, $config['userfilename']);
            break;
    }

    return $rows;
}