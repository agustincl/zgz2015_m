<?php
    /**
     * Dibuja el array
     * 2 dim: como una tabla
     * 1 dim: como una lista separada por comas
     *
     * @param array $array
     * @return null
     * */
    function DibujaArray($array){
    
        if (sizeof($array[0]) > 1){
            echo "<table border=1>";
            foreach ($array as $valor){
                echo "<tr>";
                foreach ($valor as $val){
                    echo "<td>".$val."</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        } else {
            foreach ($array as $id=>$num){
                if ($id == sizeof($array)-1)
                    echo $num.".";
                    else
                        echo $num.", ";
            }
        }
    }