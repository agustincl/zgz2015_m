<?php


function Execute($link, $query)
{
    $result = mysqli_query($link, $query);
    
    return $result;
}