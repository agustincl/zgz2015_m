<?php

if(isset($_GET['action']))
    $action=$_GET['action'];
else
    $action = 'select';


switch($action)
{
    case 'insert':        
        if($_POST)
        {
            $_POST['photo']=$_FILES['photo']['name'];
            include("../modules/Application/src/Application/Model/Txt/Insert.php");
            Insert($_POST, 'user.txt');
            // saltar a tabla
            header("Location: /UserController.php");
        }
        else
        {
            include ("../modules/Application/views/user/insert.phtml");
        }
           
        break;
    case 'update':
        echo "Update";
        break;
    case 'select':
        
        // Leer el archivo de texto en un string
        $users = file_get_contents('user.txt');
        
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
                Delete($_POST['id'], 'user.txt');
            }
            // Saltar a select
            header("Location: /UserController.php");
        }
        else 
        {
            
            // Formulario de si/no para user id
            $id =$_GET['id'];
            $name =$_GET['id'];
            include ("../modules/Application/views/user/delete.phtml");
        }
        break;
}
