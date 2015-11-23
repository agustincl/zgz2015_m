<?php
/**
 * Checkbox | Select multiple tag
 *
 * @param string $name
 * @param array $values assoc
 * @param array $selected with selected values keys
 * @param string $type [CHECKBOX|SELECTMULTIPLE]
 * @return string
 */
function SelectMultipleTag($name, $values, $selected, $type) {
    
    $tag = '';
    if ($selected == 'null') {
        $selected = NULL;
    }
        
    if ($type == "CHECKBOX"){
    
        foreach ($values as $key => $value) {
            
            if ($selected && in_array($key, $selected)) {
                $tag .= '<input type="checkbox" name="'.$name.'" value="'.$key.'" checked>'.$value.' ';
            } else {
                $tag .= '<input type="checkbox" name="'.$name.'" value="'.$key.'">'.$value.' ';
            }
            
        }
    
    } else {
    
        $tag = '<select multiple size="3" name="'.$name.'[]">';
        foreach ($values as $key => $value) {
            
            if ($selected && in_array($key, $selected)) {
                $tag .= '<option value="'.$key.'" selected>'.$value.'</option> ';
            } else {
                $tag .= '<option value="'.$key.'">'.$value.'</option> ';
            }
            
        }
        $tag .= '</select>';
    }
     
    return $tag;
    
}