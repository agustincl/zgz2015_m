<?php
/**
 * Button tag
 *
 * @param string $name
 * @param string $value
 * @param string $type [BUTTON | SUBMIT]
 */
function ButtonTag($name, $value, $type) {
    $tag = "<input type=\"".$type."\" name=\"".$name."\" value=\"".$type."\">";
    return $tag;
}