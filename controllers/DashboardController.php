<?php

namespace Controllers;

use Model\Registro;
use Model\Proyecto;
use Model\Tarea;
use Model\Usuario;
use MVC\Router;

class DashboardController
{

    public static function index(Router $router)
    {
        // Obtener el total de cada bloque
        $tareas_total = Tarea::total();
        $proyectos_total = Proyecto::total();

        // Obtener todos los tareas
        $tareas = Tarea::all();
        $proyectos = Proyecto::all();


        // Obtener ultimos registros
        $registros = Registro::get(5);
        foreach ($registros as $registro) {
            $registro->usuario = Usuario::find($registro->usuario_id);
        }

        $router->render('admin/dashboard/index', [
            'titulo' => 'Panel de Administración',
            'tareas_total' => $tareas_total,
            'tareas' => $tareas,
            'proyectos_total' => $proyectos_total,
            'proyectos' => $proyectos
        ]);
    }
}
