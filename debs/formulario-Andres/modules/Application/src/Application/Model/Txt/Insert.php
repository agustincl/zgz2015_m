<?php
function Insert($data, $fileName)
{
	$users = file_get_contents('user.txt');
	$users = explode("|", $users);
	
	
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
	
	if ((sizeof($users) == 1) && ($users[0] == ""))
		{
			$user = implode("|", $data);
		}
		else
		{
			$user = "\n".implode("|", $data);
		}
    
    // Escribir el string a un fichero de texto
    file_put_contents($fileName, $user, FILE_APPEND);
}

