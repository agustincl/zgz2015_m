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
    
    if ($type == "RADIO"){
        $tag='';
        foreach ($values as $key => $value) {

            if ($key == $selected) {
                $tag .= '<input type="radio" name="'.$name.'" value="'.$key.'" checked>'.$value.' ';
            } else {
                $tag .= '<input type="radio" name="'.$name.'" value="'.$key.'">'.$value.' ';
            }
        }
    } else {
        
        $tag = '<select name = "'.$name.'">';
        foreach ($values as $key => $value) {
            if ($key == $selected) {
                $tag .= '<option value = "'.$key.'" selected>'.$value.'</option> ';
            } else {
                $tag .= '<option value = "'.$key.'">'.$value.'</option> ';
            }
        }
        $tag .= '</select>';
    }
     
    return $tag;
}