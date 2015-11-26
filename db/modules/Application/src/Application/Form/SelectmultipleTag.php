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

function SelectmultipleTag($name, $values, $select, $type)
{
    if($select=='null')
        $select=null;
//    Idiomas:
    $output='';
    if($type == "SELECTMULTIPLE")
    {
        $output = "<SELECT MULTIPLE SIZE= \"3\" NAME=\"".$name."[]\">";        
    }
    foreach($values as $key => $value)
    {
    
         if($type == "SELECTMULTIPLE")
         {
             if($select && in_array($key, $select))
             {
                $output .= "<OPTION VALUE=\"".$key."\" SELECTED > ".$value;
             }
             else
             {
                 $output .= "<OPTION VALUE = \"".$key."\" > ".$value;
             }
         }
         else   //checkbox
         {
             
             if($select && in_array($key, $select))
             {
                $output .= '<INPUT TYPE= "checkbox" NAME="'.$name.'[]" VALUE="'.$key.'"  CHECKED>'.$value;
             }
             else 
             {
                $output .= '<INPUT TYPE="checkbox" NAME="'.$name.'[]" VALUE="'.$key.'" >'.$value;
             }
         }       
     
    } 
    if($type == "SELECTMULTIPLE")
    {
        $output .= "</SELECT>";
    }
    return $output;
}