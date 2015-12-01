<?php
/**
 * File tag
 * @param string $name
 * @return string
 */

function FileTag($name)
{
    $result = "<INPUT TYPE='file' NAME='" . $name . "'>";
    return $result;
}