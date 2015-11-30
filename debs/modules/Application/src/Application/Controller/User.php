<?php
include("../modules/Utils/src/Utils/Form/FilterData.php");
include('../modules/Application/src/Application/Model/Mapper/UserMapper/GetUsers.php');
include('../modules/Application/src/Application/Model/Mapper/UserMapper/GetUser.php');
include('../modules/Application/src/Application/Model/Mapper/UserMapper/InsertUser.php');
include('../modules/Application/src/Application/Model/Mapper/UserMapper/DeleteUser.php');
include('../modules/Application/src/Application/Model/Mapper/UserMapper/UpdateUser.php');
include('../modules/Utils/src/Utils/View/RenderView.php');

$userfilename = $_SERVER['DOCUMENT_ROOT'].'/../data/user.txt';
$formdef = "../modules/Application/src/Application/Form/register.json";

switch($router['action']) {
    
    case 'index':
    case 'select':
        $rows = GetUsers ($config);
        switch($config['adapter']){
            case 'Mysql':
                foreach ($rows as $val)
                    $keys[] = $val['iduser'];
                $content = RenderView($router, array('rows'=>$rows, 'ids'=>$keys));
                break;
            case 'Txt':
                $content = RenderView($router, array('rows'=>$rows, 'ids'=>array_keys($rows)));
                break;
        }
        break;
    case 'insert':        
        if($_POST) {
            $data = filterData($_POST, $formdef);
            $validate = validateData($data, $formdef);
            
            if ($validate['result']===true) {
                InsertUser($config, $_POST, $userfilename);
                // saltar a tabla
                header("Location: /user/select");
            } else {
                $content = RenderView($router, array('data'=>$_POST,'config'=>$config, 'validation'=>$validate));
            }
        } else {
            $rows = GetUsers($config);
            $content = RenderView($router, array('rows'=>$rows,'config'=>$config));
        }
        break;
    case 'update':
        if($_POST) {
//             print_r($_POST);
//             $_POST['photo']=$_FILES['photo']['name'];
            include("../modules/Application/src/Application/Model/Txt/Update.php");
            Update($_POST['id'], $_POST, $userfilename);
            // saltar a tabla
            header("Location: /user/select");
        } else {
            $row = GetUser($config, $router['params']['id']);
            $id = $router['params']['id'];
            $content = RenderView($router, array('row'=>$row, 'id'=>$id, 'config'=>$config));
        }
        break;
    case 'delete':
        
        if($_POST) {
            if($_POST['submit']=='si')
                DeleteUser($config, $_POST['id']);
            // Saltar a select
            header("Location: /user/select");
        } else {
            $row = GetUser ($config, $router['params']['id']);
            $id =$router['params']['id'];
            switch($config['adapter']){
                case 'Mysql':
                    $content = RenderView($router, array('row'=>$row, 'id'=>$id, 'name'=>$row['name']));
                    break;
                case 'Txt':
                    $content = RenderView($router, array('row'=>$row, 'id'=>$id, 'name'=>$id));
                    break;
            }
        }
        break;
}
include ("../modules/Application/views/layout/dashboard.phtml");