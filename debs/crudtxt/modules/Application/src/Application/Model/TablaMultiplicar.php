<?php
    /**
     * Tabla de multiplicar de a, b
     * @param int $a
     * @param int $b
     * @return array
     * */
    function TablaMultiplicar($a, $b){
        $arrayFilas = array();
    
        for ($i = 0; $i <= $b; $i++){
    
            $arrayColumnas = array();
    
            for ($j = 0; $j <= $a; $j++){
                if ($i == 0){
                    $arrayColumnas[] = $j;
                } else if ($j == 0) {
                    $arrayColumnas[] = $i;
                } else {
                    $arrayColumnas[] = $j * $i;
                }
            }
    
            $arrayFilas[] = $arrayColumnas;
        }
    
        return $arrayFilas;
    }