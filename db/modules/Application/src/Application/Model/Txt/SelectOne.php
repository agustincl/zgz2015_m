<?php


function SelectOne($userfilename, $id)
{
    // Leer el archivo de texto en un string
    $users = file_get_contents($userfilename);
    
    // convertir el string en array separando por saltos de linea
    $users = explode("\n", $users);
    $user = explode("|", $users[$id]);
    
    return $user;
}