<?php


/**
 * Función para hacer un control Select y un Radio
 *
 * @param string $name
 * @param array $values assoc
 * @param string $selected key from values
 * @param string $type[SELECT|RADIO]
 * @return string
 */
function SelectTag($name, $values, $selected, $type){

    $tag='';
    if ($type == "RADIO"){

        foreach ($values as $key=>$value){

            if ($key == $selected){
                 
                $tag = $tag . "<input type=\"radio\"name=\"".$name."\" value=\"".$key."\  checked >$value".$selected."  ";

            }else{

                $tag = $tag . "<input type=\"radio\"name=\"".$name."\" value=\"".$key."\" >$value ";
            }
        }
    }else{
        $tag = $tag . "<select name = \"".$name."\">";

        foreach ($values as $key=>$value){
            if ($key == $selected){
                $tag = $tag . "<option value = \"".$key."\" selected>".$value;
            }else{
                
                $tag = $tag . "<option value = \"".$key."\">".$value;
            }

        }
        $tag = $tag . "</select>";
    }
     
    return $tag;
}



