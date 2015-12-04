<?php
/**
 * Button tag
 *
 * @param string $name
 * @param string $value
 * @param string $type[BUTTON|SUBMIT]
 * @return string
 */
function ButtonTag($name, $value, $type)
{
    $tag= "<INPUT TYPE=\"".$type."\" NAME=\"".$name."VALUE=\"".$value."\">";
    return $tag;
}

