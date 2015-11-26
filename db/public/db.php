<?php

// Conectarse al servidor
$link = mysqli_connect('127.0.0.1', 'php', '1234');

// Selecccionar la base de datos
mysqli_select_db($link, 'crud');

// Consulta de lectura
$query = 'SELECT * FROM city';
$result = mysqli_query($link, $query);

while ($row = mysqli_fetch_assoc($result))
{
    echo "<pre>";
    print_r($row);
    echo "</pre>";
}

// Consulta de modificación
$query = "INSERT INTO city SET city='Lisboa'";
mysqli_query($link, $query);



