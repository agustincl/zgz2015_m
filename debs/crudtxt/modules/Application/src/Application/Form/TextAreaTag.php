<?php
/**
 * TextArea tag
 *
 * @param string $name
 * @param string $content
 * @return string
 */
function TextAreaTag ($name, $content){
    $tag = '<textarea name="'.$name.'">'.$content.'</TEXTAREA>';
    return $tag;
}