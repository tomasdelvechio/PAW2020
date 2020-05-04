 <?php

    $router->get('', 'TurnosController@index');
    $router->get('turnos/index', 'TurnosController@index');
    $router->get('turnos/nuevo', 'TurnosController@nuevo');
    $router->get('turnos/ver', 'TurnosController@ver');
    $router->get('turnos/modificar', 'TurnosController@modificar');
    $router->get('turnos/borrar', 'TurnosController@borrar');
    $router->post('turnos/guardar', 'TurnosController@guardar');
    

    $router->get('not_found', 'ProjectController@notFound');
    $router->get('internal_error', 'ProjectController@internalError');
