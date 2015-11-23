<?php
echo "<pre>Get: ";
print_r($_GET);
echo "</pre>";

echo "<pre>POST: ";
print_r($_POST);
echo "</pre>";

echo "<pre>Files: ";
print_r($_FILES);
echo "</pre>";

// Guardar en un archivo de texto un usuario
// data1|data2|data3.1,data3.2,data3.3|data4

// Recorrar el array de datos
// Pasar a una function que cree el csv
// Guardar el csv en el fichero
//--------------------------------------------------------

// Para cada elemento del array POST
foreach ($_POST as $key => $value)
{
    // Si es un array
    if(is_array($value))
    {
        // Separar por comas
        $_POST[$key]=implode(',', $value);
    }   
}
$_POST['photo']=$_FILES['photo']['name'];
// Juntar por pipes cada elemento del array en un string
$user = implode("|", $_POST)."\n";
// Escribir el string a un fichero de texto
file_put_contents('user.txt', $user, FILE_APPEND);

    

