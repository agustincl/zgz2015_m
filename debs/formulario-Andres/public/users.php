<?php

// Leer el archivo de texto en un string
$users = file_get_contents('user.txt');

// convertir el string en array separando por saltos de linea
$users = explode("\n", $users);

echo "<a href=\"formulario.php\">Insert</a>";
echo "<table border=1>";
// Para cada linea
foreach ($users as $key => $user)
{
    echo "<tr>";
     // Separar por pipes
     $user = explode("|", $user);
    // Recorrer la informacion del usuario
    foreach ($user as $data)
    {
        // Mostar el dato
        echo "<td>";
        echo $data;
        echo "</td>";
    }
    
        echo "<td>";
        echo "<a href=\"#\">Update</a> |
              <a href=\"#\">Delete</a> 
              ";
        echo "</td>";
    
    echo "</tr>";
}
echo "</table>";