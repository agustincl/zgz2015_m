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
            // procesar datos
            // Para cada elemento del array POST
            foreach ($_POST as $key => $value)
            {
                // Si es un array
                if(is_array($value))
                {
                    // Separar por comas
                    $_POST[$key]=implode(',', $value);
                }
            }
            $_POST['photo']=$_FILES['photo']['name'];
            // Juntar por pipes cada elemento del array en un string
            $user = implode("|", $_POST)."\n";
            // Escribir el string a un fichero de texto
            file_put_contents('user.txt', $user, FILE_APPEND);

            // saltar a tabla
            header("Location: /UserController.php");
        }
        else
        {
            // mostrar formulario vacio
            $form = file_get_contents("register.json");
            
            $form = json_decode($form, true);
            
            // echo "<pre>";
            // print_r($form);
            // echo "</pre>";
            
            include("../modules/Application/src/Application/Form/FileTag.php");
            include("../modules/Application/src/Application/Form/SelectTag.php");
            include("../modules/Application/src/Application/Form/SelectmultipleTag.php");
            include("../modules/Application/src/Application/Form/ButtonTag.php");
            include("../modules/Application/src/Application/Form/TextareaTag.php");
            include("../modules/Application/src/Application/Form/TextTag.php");
            include("../modules/Application/src/Application/Form/FormTag.php");
            
            
            echo "</ul>";
            echo call_user_func_array('FormTag',$form['FormTag'])."\n";
            foreach ($form['Elements'] as $element)
            {
                echo "<li>".$element['label']."\n";
                echo call_user_func_array($element['type'],$element['params'])."\n";
                echo "</li>"."\n";
            }
            echo "</form>";
            echo "<ul>";
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
        
        echo "<a href=\"UserController.php?action=insert\">Insert</a>";
        echo "<table border=1>";
        // Para cada linea
        foreach ($users as $key => $user)
        {
            echo "<tr>";
             // Separar por pipes
             $user = explode("|", $user);
            // Recorrer la informacion del usuario
            foreach ($user as $data)
            {
                // Mostar el dato
                echo "<td>";
                echo $data;
                echo "</td>";
            }
            
                echo "<td>";
                echo "<a href=\"UserController.php?action=update&id=".$key."\">Update</a> |
                      <a href=\"UserController.php?action=delete&id=".$key."\">Delete</a> 
                      ";
                echo "</td>";
            
            echo "</tr>";
        }
        echo "</table>";
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
