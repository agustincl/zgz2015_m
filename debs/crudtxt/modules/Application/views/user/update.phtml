<?php 

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

// Leer los usuarios en un string
$users = file_get_contents($_GET['filename']);
// Separar el string en un array por saltos de linea
$users = explode("\n", $users);
$user = $users[$id];
// Separar por pipes
$user = explode("|", $user);

echo "</ul>";
echo '<form action="UserController.php?action=update" method="POST" enctype="multipart/form-data">';
foreach ($form['Elements'] as $key=>$element)
{
    echo "<li>".$element['label']."\n";
    $params = $element['params'];
    switch ($element['type']) 
    {
        case 'SelectTag':
            $params['selected'] = $user[$key];
            break;
        case 'SelectmultipleTag':
            $params['selected'] = (array)$user[$key];
            break;
        case 'TextTag':
            $params['value'] = $user[$key];
            break;
        case 'TextareaTag':
            $params['content'] = $user[$key];
            break;
        case 'FileTag':
            $params['name'] = $user[$key];
            break;
    }
    echo call_user_func_array($element['type'],$params)."\n";
//     echo call_user_func_array($element['type'],$element['params'])."\n";
    echo "</li>"."\n";
}
echo '<INPUT TYPE="HIDDEN" NAME="id" VALUE="'.$id.'">';
echo "</form>";
echo "<ul>";