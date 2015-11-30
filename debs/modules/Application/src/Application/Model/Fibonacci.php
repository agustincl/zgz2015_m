<?php
/**
 * fibonacci hasta el max
 *
 * @param int $max
 * @return array
 */
function Fibonacci($max)
{
    $fibo=array();
    
    $n0=0;
    $fibo[]=$n0;
    $n1=1;
    $fibo[]=$n1;
    $n2 = $n0 + $n1;
    
    while($n2<=$max)
    {
        $fibo[]=$n2;
        $n0=$n1;
        $n1=$n2;
        $n2=$n0+$n1;
    }
    
    return $fibo;
    
}