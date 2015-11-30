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

    foreach ($form['Elements'] as $element) {
        
        $html .= "<li>".$element['label']."\n";
        $params = $element['params'];
        switch ($params['name']) {
            case 'name':
                $params['value'] = $row['name'];
                break;
            case 'email':
                $params['value'] = $row['email'];
                break;
            case 'password':
                $params['value'] = $row['password'];
                break;
            case 'description':
                $params['content'] = $row['description'];
                break;
            case 'bdate':
                $params['value'] = substr($row['bdate'], 0, 10);
                break;
            case 'city':
                // TODO
                break;
            case 'gender':
                // TODO
                break;
            case 'languages':
                // TODO
                break;
            case 'pets':
                // TODO
                break;
        }
        $html .= call_user_func_array($element['type'],$params)."\n";
        $html .= "</li>"."\n";
    }

    $html.= '<input type="hidden" name="id" value="'.$id.'">';
    $html.="</form>";
    $html.="<ul>";
    return $html;
}