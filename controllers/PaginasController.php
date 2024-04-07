<?php

namespace Controllers;
use MVC\Router;
use Model\Proyecto;
use Model\Tarea;

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
        $router->render('admin/dashboard/index', [
            'titulo' => 'Panel de Administración',
        ]);
    }
    
    public static function tareas(Router $router)
    {

        // Obtener el total de cada bloque
        $tareas_total = Tarea::total();

        // Obtener todos los tareas
        $tareas = Tarea::all();

        $router->render('paginas/tareas', [
            'titulo' => 'Tareas',
            'tareas_total' => $tareas_total,
            'tareas' => $tareas
        ]);
    }

    public static function proyectos(Router $router)
    {

        // Obtener el total de cada bloque
        $proyectos_total = Proyecto::total();

        // Obtener todos los tareas
        $proyectos = Proyecto::all();

        $router->render('paginas/proyectos', [
            'titulo' => 'Proyectos',
            'proyectos_total' => $proyectos_total,
            'proyectos' => $proyectos
        ]);
    }
}
