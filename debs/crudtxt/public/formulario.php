<?php
$form = file_get_contents("register.json");

$form = json_decode($form, TRUE);

include("../modules/Application/src/Application/Form/FileTag.php");
include("../modules/Application/src/Application/Form/SelectTag.php");
include("../modules/Application/src/Application/Form/SelectMultipleTag.php");
include("../modules/Application/src/Application/Form/ButtonTag.php");
include("../modules/Application/src/Application/Form/TextAreaTag.php");
include("../modules/Application/src/Application/Form/TextTag.php");
include("../modules/Application/src/Application/Form/FormTag.php");

echo "<ul>";
echo call_user_func_array('FormTag', $form['FormTag'])."\n";
foreach ($form['Elements'] as $element){
    echo "<li>".$element['label']."\n";
    echo call_user_func_array($element['type'], $element['params'])."\n";
    echo "</li>"."\n";
    
}
echo "</form>";
echo "</ul>";