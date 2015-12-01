<?php

function RenderView($router, $viewParams)
{
    ob_start();
        include("../modules/".$router['module']."/views/".
                              $router['controller']."/".
                              $router['action'].".phtml");
        $content = ob_get_contents();
    ob_end_clean();
    
    return $content;
}