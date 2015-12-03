<?php
namespace Application\Options;

class Options
{
    public $master = array('host'=>'127.0.0.1',
        'user'=>'php',
        'password'=>'1234',
        'database'=>'crud'
    );
    public $slave = array('host'=>'127.0.0.1',
        'user'=>'php',
        'password'=>'1234',
        'database'=>'crud'
    );
    public $adapter = 'Adapter';
    public $userfilename = '/../data/user.txt';
}