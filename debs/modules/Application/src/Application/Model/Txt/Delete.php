<?php 

function Delete($id, $fileName)
{
    // Borrar usuario
    // Leer los usuarios en un string
    $users = file_get_contents($fileName);
    // Separar el string en un array por saltos de linea
    $users = explode("\n", $users);
    // TODO: Eliminar fichero de foto del usuario ID
    $photo = substr($users[$id], strrpos($users[$id], "|")+1, strlen($users[$id]));
    $dir = $_SERVER['DOCUMENT_ROOT'].'/img/';
    $files = scandir($dir);
    if (in_array($photo, $files)){
        unlink($_SERVER['DOCUMENT_ROOT'].'/img/'.$photo);
    }
    // Borar el usuario ID
    unset($users[$id]);
    // Concatenar los usuarios por saltos de linea
    $users = implode("\n", $users);
    // Reescribir el fichero
    file_put_contents($fileName, $users);
}

