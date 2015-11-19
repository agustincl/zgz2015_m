<?php

// $a = [];

$a = array('nombre'=>'agustin', 
           'apellido'=>'calderon', 
           'email'=>'agustincl@gmail.com', 
           'gatos'=>4,
           'barcelona',
           'zaragoza',
           '5'=>'santiago',
           'valencia',
           '2'=>'algo',
           'otros',
           'otro mas',
           'otra cosa',
           '5'=>'kkkk',
           7,4=>'jajaja',
           8.9=>'y esto',
           'direccion'=>array('zaragoza', 50098, 'C Pilar 32'),
           true=>false
    
);

echo "<pre>";
print_r($a);
echo "</pre>";

echo $a['email'];
echo $a[2];


foreach ($pacientes as $id=>$paciente)
{
    echo $key.": ".$value;
    echo "<br/>";
    echo $paciente['nombre']
}



$id = 12;

foreach ($a as $value)
{
    echo $value;
    echo "<br/>";
}


echo $a['direccion'][2];


$pacientes = array ('1'=>array()
                    '2'=>array('nombre'=>'')
)




