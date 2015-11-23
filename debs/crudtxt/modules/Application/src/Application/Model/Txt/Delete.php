<?php

function Delete($fileName, $id)
{
    // borrar usuario
    // Leer los usuariosen un string
    $users = file_get_contents($fileName);
    // Separar el string en un array por saltos de linea
    $users = explode("\n", $users);
    // Borrar el usuario ID
    unset($users[$id]);
    // Concatenar los usuarios por salto de linea
    $users = implode("\n", $users);
    // Reescribir el fichero
    file_put_contents($fileName, $users);
}
