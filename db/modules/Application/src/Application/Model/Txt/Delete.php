<?php 

function Delete($id, $fileName)
{
    // Borrar usuario
    // Leer los usuarios en un string
    $users = file_get_contents($fileName);
    // Separar el string en un array por saltos de linea
    $users = explode("\n", $users);
    // Borar el usuario ID
    unset($users[$id]);
    // Concatenar los usuarios por saltos de linea
    $users = implode("\n", $users);
    // Reescribir el fichero
    file_put_contents($fileName, $users);
}

