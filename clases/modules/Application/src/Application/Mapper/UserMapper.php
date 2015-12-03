<?php
namespace Application\Mapper;

class UserMapper
{
    public function GetUsers($options)
    {
        $rows = array();
        switch($options->adapter)
        {
            case 'Mysql':
                include('/modules/Application/src/Application/Model/Mysql/connect.php');
                include('/modules/Application/src/Application/Model/Mysql/Select.php');
                $link = Connect($options->slave);
                $query = "SELECT * FROM user";
                $rows = Select($link, $query);
                break;
            case 'Txt':
                include('/modules/Application/src/Application/Model/Txt/Select.php');
                $rows = Select($options->userfilename);
                break;
        }
    
        return $rows;
    }
    
    public function GetUser($config, $id)
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
    
    public function DeleteUser($config, $id)
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
}