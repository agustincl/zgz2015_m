<?php
/**
 * Tabla de multiplicar de dos factores a, b
 * @param int $filas
 * @param int $columnas
 * @return array
 */
function TablaMultiplicar($filas, $columnas)
{
   
   for($a=0;$a<=$filas;$a++)
   {
       
        for ($b=0;$b<=$columnas;$b++)
        {
            if($a==0)
            {
                $tabla[0][$b] = $b;
            }
            elseif($b==0)
            {
                $tabla[$a][0] = $a;                
            }
            else
                $tabla[$a][$b] = $a*$b;
        }
   }
   return $tabla;
}
