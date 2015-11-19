<?php

/**
 * Form tag
 * 
 * @param string $action
 * @param string $method [GET|POST]
 * @param boolean $withfile
 * @return string
 */
function FormTag($action, $method, $withfile)

/**
 * Textarea tag
 * 
 * @param string $name
 * @param string $content
 * @return string
 * 
 */
function TextareaTag($name, $content)

/**
 * Button tag
 * 
 * @param string $name
 * @param string $value
 * @param string $type[BUTTON|SUBMIT]
 * @return string
 */
function ButtonTag($name, $value, $type)

/**
 * Checkbox | Select multiple tag
 * 
 * @param string $name
 * @param array $values assoc
 * @param array $select with selected values keys
 * @param string $type[CHECKBOX|SELECTMULTIPLE]
 * @return string
 */

function MultipleTag($name, $values, $select, $type)

/**
 * File tag
 * @param string $name
 * @return string
 */
function FileTag($name)

/**
 * Text | Email | Date | Password tag
 * 
 * @param string $name
 * @param string $value
 * @param string $type[TEXT|EMAIL|DATE|PASSWORD]
 * @return string
 */
function TextTag($name, $value, $type)

/**
 * Función para hacer un control Select y un Radio
 * 
 * @param string $name
 * @param array $values assoc
 * @param string $selected key from values 
 * @param string $type[SELECT|RADIO]
 * @return string
 */
function SelectTag($name, $values, $selected, $type){

}





