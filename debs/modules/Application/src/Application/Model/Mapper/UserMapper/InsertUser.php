<?php

function InsertUser($config, $data, $filename){
    $rows = array();
    switch($config['adapter']){
        case 'Mysql':
            include('../modules/Application/src/Application/Model/Mysql/Execute.php');
            include('../modules/Application/src/Application/Model/Mysql/Connect.php');
            $link = Connect($config['slave']);
            $query = 
                'INSERT INTO user (iduser, name, email, password, photo, description, bdate, city_idcity, gender_idgender) VALUES '.
                '("4", "'.$data['name'].'", "'.$data['email'].'", "'.$data['password'].'", "'.$_FILES['photo']['name'].'", "'.$data['description'].'", "'.$data['bdate'].'", 1, 1)';
            $rows = Execute($link, $query);
            break;
        case 'Txt':
            include("../modules/Application/src/Application/Model/Txt/Insert.php");
            Insert($_POST, $filename);
            break;
    }
    
    // Obtener nombre de la imagen subida
    $_POST['photo']=$_FILES['photo']['name'];
    // Comprobar si el nombre de archivo existe
    $dir = $_SERVER['DOCUMENT_ROOT'].'/img/';
    $files = scandir($dir);
    if (in_array($_POST['photo'], $files)){
        // Si existe se concatena con un numero
        // Comprobar si hay algun otro archivo con el mismo nombre y un numero concatenado
        $filtrado = "/".substr($_POST['photo'],0, -4)."*/";
        $extension = substr($_POST['photo'],-3);
        $filesMatch = array();
        foreach ($files as $archivo){
            $ext2 = substr($archivo,-3);
            if (preg_match($filtrado, $archivo) && $extension === $ext2){
                $filesMatch[] = (int)substr($archivo, strrpos($archivo, "_")+1, strlen($archivo));
            }
        }
        $filesMatchAux = range(1, max($filesMatch));
        $missing = array_diff($filesMatchAux, $filesMatch);
        if (count($missing) > 0)
            $_POST['photo'] = substr($_POST['photo'],0, -4) . '_' . min($missing) . '.' . $extension;
            else
                $_POST['photo'] = substr($_POST['photo'],0, -4) . '_' . (max($filesMatch)+1) . '.' . $extension;
    }
    // Declarar destino donde guardar la imagen
    $destination = $_SERVER['DOCUMENT_ROOT'].'/img/'.$_POST['photo'];
    // Pasarla de ruta temporal a ruta fisica en el servidor
    move_uploaded_file($_FILES['photo']['tmp_name'], $destination);
    
    return $rows;
}