<?php

/**
 * Filtro de datos segun el tipo de campo a rellenar
 * @param string $post
 * @return boolean
 */
function validateData($post){
    echo "<pre>";
    print_r($post);
    echo "</pre>";
    
    foreach ($post as $type => $value){
        switch ($type) {
            case 'city':
                if (!in_array($value, array('ZGZ','BCN'))) return false;
                break;
            case 'gender':
                if (!in_array($value, array('M','H', 'O'))) return false;
                break;
            case 'languajes':
                foreach ($value as $lang){
                    if (!in_array($lang, array('es','en'))) return false;
                }
                break;
            case 'pets':
                foreach ($value as $pet){
                    if (!in_array($pet, array('DOG','CAT'))) return false;
                }
                break;
            case 'email':
                break;
            case 'password':
                break;
            case 'name':
                break;
            case 'bdate':
                break;
            case 'description':
                break;
        }
    }
}