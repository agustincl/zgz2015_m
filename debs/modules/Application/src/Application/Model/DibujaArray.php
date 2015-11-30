<?php
/**
 * Dibuja el array
 * 2 dim: como una tabla
 * 1 dim: como una lista separada por comas
 *
 * @param array $array
 * @return null
 */
function DibujaArray($a)
{
    if (isset($a[0][0]))
    {
        echo"<table border = 1>";
        for ($e = 0;$e<sizeof($a);$e++){
            echo "<tr>";
            for ($i = 0;$i<sizeof($a[0]);$i++){
                
                echo "<td>";
                echo $a[$e][$i];
                echo "</td>";
            }
            echo "</tr>";
        }echo "</table>";
    }
    else
    {
        for ($e = 0;$e<sizeof($a);$e++){
            echo $a[$e].", ";
        }   
    }    
}