<?php
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

