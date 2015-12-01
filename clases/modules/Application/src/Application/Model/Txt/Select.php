<?php


function Select($userfilename)
{
    // Leer el archivo de texto en un string
    $users = file_get_contents($userfilename);
    
    // convertir el string en array separando por saltos de linea
    $users = explode("\n", $users);
    foreach ($users as  $key=> $user)
    {
        $rows[] = explode("|", $user);
        $rows[$key]['iduser']=$key;
    }
    return $rows;
}