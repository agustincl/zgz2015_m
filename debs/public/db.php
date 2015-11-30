<?php
// Conectarse al servidor
$link = mysqli_connect('127.0.0.1', 'php', 'querty');

// Seleccionar la base de datos
mysqli_select_db($link, 'crud');

// Consulta de lectura
$query = 'SELECT * FROM CITY';
$result = mysqli_query($link, $query);

while ($row = mysqli_fetch_assoc($result)){
    echo "<pre>";
    print_r($row);
    echo "</pre>";
}

$query = "INSERT INTO city SET city = 'Parla'";
mysqli_query($link, $query);
