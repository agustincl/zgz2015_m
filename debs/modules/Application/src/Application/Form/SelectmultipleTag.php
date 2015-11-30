<?php 

/**
 * SelectmultipleTag | Select multiple tag
 *
 * @param string $name
 * @param array $values assoc
 * @param array $select with selected values keys
 * @param string $type[CHECKBOX|SELECTMULTIPLE]
 * @return string
 */

function SelectmultipleTag($name, $values, $select, $type) {
    if($select=='null')
        $select=null;
//    Idiomas:
    $output='';
    if($type == "SELECTMULTIPLE") {
        $output = '<select multiple size="3" name="'.$name.'"[]>';        
    }
    foreach($values as $key => $value)
    {
    
         if($type == "SELECTMULTIPLE") {
             if($select && in_array($key, $select)) {
                $output .= '<option value="'.$key.'" selected>'.$value;
             } else {
                $output .= '<option value="'.$key.'">'.$value;
             }
         } else { //checkbox
             
             if($select && in_array($key, $select)) {
                $output .= '<input type="checkbox" name="'.$name.'[]" value="'.$key.'"  checked>'.$value;
             } else  {
                $output .= '<input type="checkbox" name="'.$name.'[]" value="'.$key.'" >'.$value;
             }
         }       
     
    } 
    if($type == "SELECTMULTIPLE") {
        $output .= "</select>";
    }
    return $output;
}