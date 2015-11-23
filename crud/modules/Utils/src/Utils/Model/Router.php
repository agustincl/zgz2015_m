<?php 

/**
 * Router
 * 
 * /                    ['controller'=>default, 'action'=>default]
 * /controller          ['controller'=>'controller', 'action'=>default]
 * /controller/action   ['controller'=>'controller', 'action'=>'action']
 * /controller/action/param1/val1/param2/val2   ['controller'=>'controller', 
 *                                               'action'=>'action', 
 *                                               'params'=>['param1'=>'val1',
 *                                                          'param2'=>'val2'
 *                                                         ]
 *                                              ]
 * c1 = not exist
 * a1 = not exist
 * p1 = not exist
 * 
 * /c1/a1           ['controller'=>'error', 'action'=>'_404']
 * /c1              ['controller'=>'error', 'action'=>'_404']
 * /c1/a1/p1        ['controller'=>'error', 'action'=>'_404']
 * /controller/a1   ['controller'=>'error', 'action'=>'_404']
 * /c1/action       ['controller'=>'error', 'action'=>'_404']
 * /controller/action/param1    ['controller'=>'error', 'action'=>'_404']
 * 
 * @param string $url
 * @return array
 */
function Router($url)
{
    $controllers = ['application'=>['user'=>['select','update','delete','insert']]];
    
    $route=array();
    echo $url;
    // Separar url por / en un array
    $url = explode('/', $url);
    
    //Controller 
    $filename = $_SERVER['DOCUMENT_ROOT']."/../modules/Application/src/Application/Controller/".ucfirst($url[1]).".php";
    
    if(isset($url[1]) && file_exists($filename))
    {
        // OK controller
        if(isset($url[2]) && in_array($url[2],$controllers[$url[1]]))
        {
            // Ok action
            for($i=3;$i<sizeof($url);$i+=2)
            {
                if(!isset($url[$i+1]))
                    return array('controller'=>'error', 'action'=>'_404');
                $params[$url[$i]]=$url[$i+1];
            }
            return array('controller'=>$url[1], 
                         'action'=>$url[2],
                         'params'=>@$params
            );
            
            echo "<pre>params:";
            print_r($params);
            echo "</pre>";
        }
        return array('controller'=>'error', 'action'=>'_404');
    }
    
    
    
    echo "<pre>";
    print_r($url);
    echo "</pre>";
    // Cases KO
        // Impar en parametros
        // Controller no existe
        // Action no existe
   // Cases OK  
        // Vacio
        // Solo controller
        // Controller, action
        // Controller, action , params
    
    
    return $route;
}