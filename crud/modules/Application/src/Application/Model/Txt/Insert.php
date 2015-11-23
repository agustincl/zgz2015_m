<?php
function Insert($data, $fileName)
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
    $user = implode("|", $data)."\n";
    // Escribir el string a un fichero de texto
    file_put_contents($fileName, $user, FILE_APPEND);
}

