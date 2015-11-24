<?php


$userfilename = $_SERVER['DOCUMENT_ROOT'].'/../data/user.txt';

   

switch($router['action'])
{
    
    case 'insert':        
        if($_POST)
        {
            echo "<pre>Post: ";
            print_r($_POST);
            echo "</pre>";
            
            include('../modules/Utils/src/Utils/Form/FilterData.php');
            $formdef="../modules/Application/src/Application/Form/register.json";
            
            $data = FilterData($_POST, $formdef);
            echo "<pre>Data: ";
            print_r($data);
            echo "</pre>";
            
            $validate = ValidateData($data, $formdef);
            
            echo "<pre>Validate: ";
            print_r($validate);
            echo "</pre>";
            
            die;
            
            
            
            
            if(isValid())
            {
                $_POST['photo']=$_FILES['photo']['name'];
                include("../modules/Application/src/Application/Model/Txt/Insert.php");
                Insert($_POST, $userfilename);
            }
            
            // saltar a tabla
            header("Location: /user/select");
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
    case 'index':
    case 'select':
        
        // Leer el archivo de texto en un string
        $users = file_get_contents($userfilename);
        
        // convertir el string en array separando por saltos de linea
        $users = explode("\n", $users);
        
        include("../modules/Application/views/user/select.phtml");
        break;
    case 'delete':
        
        if($_POST)
        {
            if($_POST['submit']=='si')
            {                  
                include ("../modules/Application/src/Application/Model/Txt/Delete.php");
                Delete($_POST['id'], $userfilename);
            }
            // Saltar a select
            header("Location: /user/select");
        }
        else 
        {
            
            // Formulario de si/no para user id
            $id =$router['params']['id'];
            $name =$router['params']['id'];
            include ("../modules/Application/views/user/delete.phtml");
        }
        break;
}
