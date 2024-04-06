<?php

namespace Controllers;
use MVC\Router;

class PaginasController
{
    public static function index(Router $router)
    {
        $router->render('paginas/index', [
            'titulo' => 'Inicio',
        ]);
    }

    public static function error(Router $router)
    {
        $router->render('paginas/error', [
            'titulo' => 'Página no encontrada'
        ]);
    }

    public static function admin(Router $router)
    {
        $router->render('admin/dashboard/index', [
            'titulo' => 'Panel de Administración',
        ]);
    }
}
