<?php

include('../modules/Application/src/Application/Model/Mapper/UserMapper/GetUsers.php');
include('../modules/Application/src/Application/Model/Mapper/UserMapper/GetUser.php');
include('../modules/Application/src/Application/Model/Mapper/UserMapper/DeleteUser.php');
include('../modules/Utils/src/Utils/View/RenderView.php');


$userfilename = $_SERVER['DOCUMENT_ROOT'].'/../data/user.txt';

   

switch($router['action'])
{
    case 'index':
    case 'select':
        $rows = GetUsers ($config);
        $content = RenderView($router, array('rows'=>$rows));
    break;
    case 'insert':        
        if($_POST)
        {
            include('../modules/Utils/src/Utils/Form/FilterData.php');
            $formdef="../modules/Application/src/Application/Form/register.json";
            $data = FilterData($_POST, $formdef);
            $validate = ValidateData($data, $formdef);
            
            if($validate['result']===true)
            {
                $_POST['photo']=$_FILES['photo']['name'];
                
                echo "<pre>";
                print_r($_FILES);
                echo "</pre>";
                
               
                $destination = $_SERVER['DOCUMENT_ROOT'].'/img/'.$_POST['photo'];
                move_uploaded_file($_FILES['photo']['tmp_name'], $destination);
                
                include("../modules/Application/src/Application/Model/Txt/Insert.php");
                Insert($_POST, $userfilename);
                header("Location: /user/select");
            }
            echo "<pre>";
            print_r($validate);
            echo "</pre>";
            // TODO: mostrar formulario con datos de usuario
            
        }
        else
        {
            include ("../modules/Application/views/user/insert.phtml");
        }
           
        break;
    case 'update':
        
        if($_POST){
//             print_r($_POST);
//             $_POST['photo']=$_FILES['photo']['name'];
            include("../modules/Application/src/Application/Model/Txt/Update.php");
            Update($_POST['id'], $_POST, $userfilename);
            // saltar a tabla
            header("Location: /user/select");
        }
        else 
        {
            // Formulario relleno con los datos
            $id = $router['params']['id'];
            $_GET['filename'] = $userfilename;
            include ("../modules/Application/views/user/update.phtml");
        }
        
        break;
    
    
    case 'delete':
        
        if($_POST)
        {
            if($_POST['submit']=='si')
            {       
                DeleteUser($config, $_POST['id']);
            }
            // Saltar a select
            header("Location: /user/select");
        }
        else 
        {            
            // Formulario de si/no para user id
            $row = GetUser ($config, $router['params']['id']);
            $id =$router['params']['id'];
            $content = RenderView($router, array('row'=>$row, 'id'=>$id));            
        }
        break;
}


include ("../modules/Application/views/layout/dashboard.phtml");
