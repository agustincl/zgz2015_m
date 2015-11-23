<?php
/**
 * Text | Email | Date | Password tag
 *
 * @param string $name
 * @param string $value
 * @param string $type[TEXT|EMAIL|DATE|PASSWORD]
 * @return string
 */
function TextTag($name, $value, $type) {
    
    if ($value == 'null') $value = NULL;
    
    $tag ='<input type="'.$type.'" name="'.$name.'" value="'.$value.'">';
    
    return $tag;
}