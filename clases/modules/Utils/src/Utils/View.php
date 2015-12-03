<?php
namespace Utils;

class View
{
    static public function RenderView($router, $viewParams)
    {
        ob_start();
        include("/modules/".$router['module']."/views/".
            $router['controller']."/".
            $router['action'].".phtml");
        $content = ob_get_contents();
        ob_end_clean();
    
        return $content;
    }
    
    static public function RenderLayout($router, $layout, $content)
    {
        ob_start();
        include("/modules/".$router['module']."/views/layout/".
                    $layout.".phtml");        
        $content = ob_get_contents();
        ob_end_clean();
    
        return $content;
    }
}