<?php
/**
 * Textarea tag
 * 
 * @param string $name
 * @param string $content
 * @return string
 * 
 */
function TextareaTag($name, $content)
{
    $html='<textarea NAME="'.$name.'">'.$content.'</textarea>';
    return $html;
}