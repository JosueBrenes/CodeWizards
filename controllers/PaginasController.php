<?php

namespace Controllers;

use Model\Proyecto;
use Model\Tarea;
use MVC\Router;


class PaginasController
{
    public static function index(Router $router)
    {
        // Obtener el total de cada bloque
        $tareas_total = Tarea::total();
        $proyectos_total = Proyecto::total();

        // Obtener todos los tareas
        $tareas = Tarea::all();
        $proyectos = Proyecto::all();

        $router->render('paginas/index', [
            'titulo' => 'Inicio',
            'tareas_total' => $tareas_total,
            'tareas' => $tareas,
            'proyectos_total' => $proyectos_total,
            'proyectos' => $proyectos
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

        // Obtener el total de cada bloque
        $tareas_total = Tarea::total();
        $proyectos_total = Proyecto::total();

        // Obtener todos los tareas
        $tareas = Tarea::all();
        $proyectos = Proyecto::all();


        $router->render('admin/dashboard/index', [
            'titulo' => 'Panel de Administración',
            'tareas_total' => $tareas_total,
            'tareas' => $tareas,
            'proyectos_total' => $proyectos_total,
            'proyectos' => $proyectos
        ]);
    }
}
