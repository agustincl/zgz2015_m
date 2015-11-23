<?php
/**
 * Text | Email | Date | Password tag
 * 
 * @param string $name
 * @param string $value
 * @param string $type[TEXT|EMAIL|DATE|PASSWORD]
 * @return string
 */
function TextTag($name, $value, $type)
{
    if($value=='null')$value=null;
    $html='';
    $html.="<INPUT TYPE=\"".$type."\" NAME=\"".$name."\" VALUE=\"".$value."\">";
	
    return $html;	
}