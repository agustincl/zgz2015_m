<?php
function Update($id, $data, $fileName)
{
    // procesar datos
    // Para cada elemento del array POST
    foreach ($data as $key => $value)
    {
        // Si es un array
        if(is_array($value))
        {
            // Separar por comas
            $data[$key]=implode(',', $value);
        }
    }
    
    // Juntar por pipes cada elemento del array en un string
    $user = implode("|", $data);
    // Actualizar usuario
    // Leer los usuarios en un string
    $users = file_get_contents($fileName);
    // Separar el string en un array por saltos de linea
    $users = explode("\n", $users);
    // Sustituir el usuario ID por los datos nuevos
    $users[$id] = $user;
    // Concatenar los usuarios por saltos de linea
    $users = implode("\n", $users);
    // Reescribir el fichero
    file_put_contents($fileName, $users);
}