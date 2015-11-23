<?php
/**
 * File tag
 *
 * @param string $name
 * @return string
 */
function FileTag($name){
    $tag = '<input type="file" name="'.$name.'">';
    return $tag;
}