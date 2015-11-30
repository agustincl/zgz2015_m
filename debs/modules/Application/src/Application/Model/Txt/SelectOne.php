<?php

function SelectOne($userfilename, $id){
    // Leer el archivo de texto en un string
    $users = file_get_contents($userfilename);
    
    // convertir el string en array separando por saltos de linea
    $users = explode("\n", $users);
    $user = explode('|', $users[$id]);
    
//     $user['iduser']=$users[6];
    $user['name']=$user[6];
    $user['email']=$user[4];
    $user['password']=$user[5];
    $user['photo']=$user[10];
    $user['description']=$user[8];
    $user['bdate']=$user[7];
    $user['city_idcity']=$user[0];
    $user['gender_idgender']=$user[1];
    
    return $user;
}