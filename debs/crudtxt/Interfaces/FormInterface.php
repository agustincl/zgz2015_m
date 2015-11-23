<?php

/**
 * Form tag
 * 
 * @param string $action
 * @param string $method [GET|POST]
 * @param boolean $withfile
 * @return string
 */
function FormTag($action, $method, $withfile){
}

/**
 * TextArea tag
 *
 * @param string $name
 * @param string $content
 * @return string
 */
function TextAreaTag ($name, $content){
}

/**
 * Button tag
 * 
 * @param string $name
 * @param string $value
 * @param string $type [BUTTON | SUBMIT]
 */
function ButtonTag($name, $value, $type) {
}

/**
 * Checkbox | Select multiple tag
 * 
 * @param string $name
 * @param array $values assoc
 * @param array $selected with selected values keys
 * @param string $type [CHECKBOX|SELECTMULTIPLE]
 * @return string
 */
function SelectMultipleTag($name, $values, $selected, $type) {
}

/**
 * File tag
 * 
 * @param string $name
 * @return string
 */
function FileTag($name){
}

/**
 * Text | Email | Date | password tag
 * 
 * @param string $type[TEXT|EMAIL|DATE|PASSWORD]
 * @param string $name
 * @param string $value
 * @return string
 */
function TextTag($name, $type, $value=NULL){
}

/**
 * Select simple | radio tag
 * 
 * @param string $name
 * @param array $values assoc
 * @param string $selected key from values 
 * @param string $type [SELECT|RADIO]
 * @return string
 */
function SelectSimpleTag($name, $values, $selected, $type){
}