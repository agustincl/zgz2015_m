<?php
    /**
     * Fibonacci hasta el max
     *
     * @param int $max
     * @return array
     * */
    function Fibonacci($max){
        $result = array();
        $n0 = 0;
        $n1 = 1;
        $result[] = $n0;
        $result[] = $n1;
        $n2 = $n0 + $n1;
    
        while ($n2 <= $max){
    
            $result[] = $n2;
    
            $n0 = $n1;
            $n1 = $n2;
            $n2 = $n0 + $n1;
        }
    
        return $result;
    }