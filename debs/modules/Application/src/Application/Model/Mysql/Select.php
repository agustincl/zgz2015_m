<?php

function Select($link, $query){
    
    $rows = array();
    $result = mysqli_query($link, $query);
    while ($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }

    return $rows;
}