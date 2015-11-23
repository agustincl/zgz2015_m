<?php


$userfilename = $_SERVER['DOCUMENT_ROOT'].'/../data/user.txt';

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
            Insert($_POST, $userfilename);
            // saltar a tabla
            header("Location: /UserController.php");
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
            header("Location: /UserController.php");
        }
        else 
        {
            // Formulario relleno con los datos
            $id = $_GET['id'];
            $_GET['filename'] = $userfilename;
            include ("../modules/Application/views/user/update.phtml");
        }
        
        break;
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
