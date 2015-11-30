<?php
$config = array (
    'defaultModule'         => 'Application',
    'defaultController'     => 'user',
    'defaultAction'         => 'index',
    'master'=>array('host'=>'127.0.0.1',
                    'user'=>'php',
                    'password'=>'1234',
                    'database'=>'crud'
    ),
    'slave'=>array('host'=>'127.0.0.1',
        'user'=>'php',
        'password'=>'1234',
        'database'=>'crud'
    ),
//     'adapter' =>'Txt',
    'adapter' =>'Mysql',
    'userfilename' => $_SERVER['DOCUMENT_ROOT'].'/../data/user.txt',
);

return $config;