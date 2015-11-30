<?php


function Execute($link, $query){
    $rows = mysqli_query($link, $query);
    return $rows;
}