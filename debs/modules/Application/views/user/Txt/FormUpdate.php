<?php

include("../modules/Application/src/Application/Form/FileTag.php");
include("../modules/Application/src/Application/Form/SelectTag.php");
include("../modules/Application/src/Application/Form/SelectmultipleTag.php");
include("../modules/Application/src/Application/Form/ButtonTag.php");
include("../modules/Application/src/Application/Form/TextareaTag.php");
include("../modules/Application/src/Application/Form/TextTag.php");

function FormUpdate ($form, $id, $row) {
    $html = "</ul>";
    $html .= '<form action="/user/update/" method="POST" enctype="multipart/form-data">';
    
    
    
    foreach ($form['Elements'] as $key=>$element) {

        $html .= "<li>".$element['label']."\n";
        $params = $element['params'];
        
//         echo "<pre>";
//         print_r($row);
//         echo "</pre>";
        switch ($element['type']) {
            case 'SelectTag':
                $params['selected'] = $row[$element['params']['name']];
                break;
            case 'SelectmultipleTag':
                $params['selected'] = explode(",",$row[$element['params']['name']]);
                break;
            case 'TextTag':
                $params['value'] = $row[$element['params']['name']];
                break;
            case 'TextareaTag':
                $params['content'] = $row[$element['params']['name']];
                break;
            case 'FileTag':
                $params['name'] = $row[$element['params']['name']];
                break;
        }
        $html .= call_user_func_array($element['type'],$params)."\n";
        $html .= "</li>"."\n";
    }

    $html.= '<INPUT TYPE="HIDDEN" NAME="id" VALUE="'.$id.'">';
    $html.="</form>";
    $html.="<ul>";
    return $html;
}