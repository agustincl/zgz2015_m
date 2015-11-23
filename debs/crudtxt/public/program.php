<?php

    phpinfo();
    
    include("../modules/Application/src/Application/Model/TablaMultiplicar.php");
    include("../modules/Application/src/Application/Model/Fibonacci.php");
    include("../modules/Application/src/Application/Model/DibujaArray.php");
    
    $a = 12;
    $b = 7;
    $max = 45;
    
    $tabla = TablaMultiplicar($a, $b);
    $fibo = Fibonacci($max);
    
    DibujaArray($tabla);
    DibujaArray($fibo);