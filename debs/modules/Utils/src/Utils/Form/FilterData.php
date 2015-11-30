<?php

/**
 * Filtro de datos segun el tipo de campo a rellenar
 * @param string $post
 * @param string $formdef
 * @return array
 */
function filterData($post, $formdef){
    
    //Para cada elemento de data
    foreach ($post as $type => $value){
        $post[$type] = Filter($value, getElementDef($formdef, $type));
        // Filtrar segun sus filtros en formdef
        // Switch de filtros
    }
    
    return $post;
}

function getElementDef($formdef, $name){
    
    $formdef = file_get_contents($formdef);
    $formdef = json_decode($formdef, true);
    foreach ($formdef['Elements'] as $element){
        if ($element['params']['name'] == $name){
            return $element;
        }
    }
    
}

function Filter($element, $elementDef) {
    
    if(isset($elementDef['filters'])){
        foreach ($elementDef['filters'] as $filter){
            switch($filter){
                case 'stringTrim':
                    $element = trim($element);
                    break;
                case 'stripTags':
                    $element = strip_tags($element);
                    break;
            }
        }
    }
    return $element;
    
}

function validateData ($post, $formdef) {
    
    // Para cada elemento de data
    foreach ($post as $key => $element){
        $post[$key] = Validate($element, $key, getElementDef($formdef, $key));
        //Validar
    }
    
    $validation['result'] = true;
    foreach ($post as $validated){
        
        if ($validated['result'] === 'notDefined' || $validated['result'] === true){
            
            $validation['result'] = $validation['result'] && true;
            
        } else {
            
            $validation['result'] = $validation['result'] && false;
            $validation['info'] = $post;
            
        }
    }
    return $validation;
    
}

function Validate($element, $key, $elementDef) {
    
    $valid=array();
    
    if(isset($elementDef['validation']))
    foreach ($elementDef['validation'] as $validate) {
        switch ($validate) {
            case 'password12':
                $valid['mes'][] = (validatePassword12($element))?true:'Password too short, min 12 characters.';
                break;
            case 'len8':
                    $valid['mes'][] = (len8($element))?true:'Len too short, min 8 characters.';
                    break;
        }
    }
    if(isset($valid['mes'])) {
        foreach ($valid['mes'] as $mes) {
            if($mes===true)
                $valid['result']=true;
            else {
                $valid['result']=false;
                break;
            }
        } 
    } else
        $valid['result']='notDefined';
    
    return $valid;
    
}

function validatePassword12($value){
    
    return (strlen($value) >= 12)?true:false;
    
}


function len8($value){

    return (strlen($value) >= 8)?true:false;

}