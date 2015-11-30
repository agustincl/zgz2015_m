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
function Router($url, $config) {
    $controllers = ['Application'=>['user'=>['index','select','update','delete','insert']]];
    
    $route=array();
    
    // Separar url por / en un array
    $url = explode('/', $url);
    
    //Controller 
    $filename = $_SERVER['DOCUMENT_ROOT']."/../modules/Application/src/Application/Controller/".ucfirst($url[1]).".php";
    
    if(file_exists($filename)) {
        
        // OK controller
        if(isset($url[2]) && in_array($url[2],$controllers[$config['defaultModule']][$url[1]])) {
            
            // Ok action
            $params = array();
            if (isset($url[3]) && !empty($url[3])) {
                
                for($i=3; $i<sizeof($url); $i+=2) {
                    if(isset($url[$i+1]))
                        $params[$url[$i]]=$url[$i+1];
                        else {
                            return array('module'=>$config['defaultModule'],'controller'=>'error', 'action'=>'_404');
                        }
                }
            }
            
            return array('module'=>$config['defaultModule'], 'controller'=>$url[1], 'action'=>$url[2], 'params'=>$params);
        } else {
            return array('module'=>$config['defaultModule'],'controller'=>'error', 'action'=>'_404');
        }
    } elseif (isset($url[1]) && $url[1]=='') {
        return array('module'=>$config['defaultModule'], 'controller'=>$config['defaultController'], 'action'=>$config['defaultAction']);
    } else {
        return array('module'=>$config['defaultModule'], 'controller'=>'error', 'action'=>'_404');
    }
        
    
    return $route;
}
