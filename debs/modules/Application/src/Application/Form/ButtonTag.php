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
    $tag= '<input type="'.$type.'" name="'.$name.'" VALUE="'.$value.'">';
    return $tag;
}

