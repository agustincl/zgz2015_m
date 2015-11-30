<?php
$config = array (
    'defaultModule'         => 'Application',
    'defaultController'     => 'user',
    'defaultAction'         => 'index',
    'master'                => array( 'host'=>'127.0.0.1',
                                      'user'=>'php',
                                      'password'=>'qwerty',
                                       'database'=>'crud'),
    'slave'                 => array( 'host'=>'127.0.0.1',
                                      'user'=>'php',
                                      'password'=>'1234',
                                      'database'=>'crud'),
    'adapter'=>'Mysql',
//     'adapter'=>'Txt',
    'userfilename' =>  $_SERVER['DOCUMENT_ROOT'].'/../data/user.txt'
);

return $config;