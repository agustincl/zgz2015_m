<?php

include('../modules/Application/src/Application/Model/Mapper/UserMapper/GetUsers.php');
include('../modules/Application/src/Application/Model/Mapper/UserMapper/GetUser.php');
include('../modules/Application/src/Application/Model/Mapper/UserMapper/DeleteUser.php');
include('../modules/Utils/src/Utils/View/RenderView.php');


$userfilename = $_SERVER['DOCUMENT_ROOT'].'/../data/user.txt';

   

switch($router['action'])
{
    case '_404':
        $content = RenderView($router, array());
        break;
}


include ("../modules/Application/views/layout/error.phtml");
