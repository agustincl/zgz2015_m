<?php

/**
 * Form tag
 * 
 * @param string $action
 * @param string $method [GET|POST]
 * @param boolean $withfile
 * @return string
 */
function FormTag($action, $method, $withfile)
{
    $text="";
    if($withfile == true)
    {
        $text='<form action="'.$action.'" method="'.$method.'" enctype="multipart/form-data">';
    }else{
        $text='<form action="'.$action.'" method="'.$method.'">';
    }
    
    return $text;
}

//Llamada a las pruebas unitarias
//include 'test.php';