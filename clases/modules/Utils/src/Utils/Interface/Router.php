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
    // Separar url por / en un array
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
