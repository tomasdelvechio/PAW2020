<?php

    $router->get('', 'TurnoController@inicio');
    $router->get('turnos/inicio', 'TurnoController@inicio');
    $router->get('turnos/nuevo', 'TurnoController@nuevo');
    $router->get('turnos/ver', 'TurnoController@ver');
    $router->get('turnos/modificar', 'TurnoController@modificar');
    $router->get('turnos/borrar', 'TurnoController@borrar');
    $router->post('turnos/guardar', 'TurnoController@guardar');
    

    $router->get('not_found', 'ProjectController@notFound');
    $router->get('internal_error', 'ProjectController@internalError');