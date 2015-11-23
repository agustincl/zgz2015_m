<?php
// phpinfo();
include ("../modules/Application/src/Application/Model/TablaMultiplicar.php");
include ("../modules/Application/src/Application/Model/Fibonacci.php");
include ("../modules/Application/src/Application/Model/DibujaArray.php");

$a = 5;
$b = 6;
$max = 35;



$tabla = TablaMultiplicar($a, $b);
$fibo = Fibonacci($max);
DibujaArray($tabla);
DibujaArray($fibo);