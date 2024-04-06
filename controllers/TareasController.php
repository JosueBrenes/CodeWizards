<?php

namespace Controllers;

use Classes\Paginacion;
use MVC\Router;
use Model\Tarea;

class TareasController
{

    public static function index(Router $router)
    {
        if (!is_admin()) {
            header('Location: /login');
        }

        $pagina_actual = $_GET['page'];
        $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);

        if (!$pagina_actual || $pagina_actual < 1) {
            header('Location: /admin/tareas?page=1');
        }
        $registros_por_pagina = 5;
        $total = Tarea::total();
        $paginacion = new Paginacion($pagina_actual, $registros_por_pagina, $total);

        if ($paginacion->total_paginas() < $pagina_actual) {
            header('Location: /admin/tareas?page=1');
        }

        $tareas = Tarea::paginar($registros_por_pagina, $paginacion->offset());

        $router->render('admin/tareas/index', [
            'titulo' => 'Tareas',
            'tareas' => $tareas,
            'paginacion' => $paginacion->paginacion()
        ]);
    }


    public static function crear(Router $router)
    {
        if (!is_admin()) {
            header('Location: /login');
        }

        $alertas = [];
        $tarea = new Tarea;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Verificar que el usuario sea administrador
            if (!is_admin()) {
                header('Location: /login');
            }

            // Obtener los datos del formulario
            $nombre = $_POST['nombre'] ?? '';
            $descripcion = $_POST['descripcion'] ?? '';
            $fecha_inicio = $_POST['fecha_inicio'] ?? '';
            $fecha_finalizacion = $_POST['fecha_finalizacion'] ?? '';
            $estado = $_POST['estado'] ?? '';
            $prioridad = $_POST['prioridad'] ?? '';

            // Asignar los valores al objeto tarea
            $tarea->nombre = $nombre;
            $tarea->descripcion = $descripcion;
            $tarea->fecha_inicio = $fecha_inicio;
            $tarea->fecha_finalizacion = $fecha_finalizacion;
            $tarea->estado = $estado;
            $tarea->prioridad = $prioridad;

            // Validar la tarea
            $alertas = $tarea->validar();

            // Verificar si hay errores de validación
            if (empty($alertas['error'])) {
                // Guardar la tarea en la base de datos
                $resultado = $tarea->guardar();

                // Redireccionar si se guardó correctamente
                if ($resultado) {
                    header('Location: /admin/tareas');
                    exit;
                }
                $alertas['error'][] = 'Error al guardar la tarea';
            }
        }

        // Renderizar la vista del formulario de creación de tareas
        $router->render('admin/tareas/crear', [
            'titulo' => 'Registrar Tarea',
            'alertas' => $alertas,
            'tarea' => $tarea,
        ]);
    }

    public static function editar(Router $router)
    {
        if (!is_admin()) {
            header('Location: /login');
        }

        // Validar el ID de la tarea
        $alertas = [];
        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if (!$id) {
            header('Location: /admin/tareas');
        }

        $tarea = Tarea::find($id);

        if (!$tarea) {
            header('Location: /admin/tareas');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Verificar que el usuario sea administrador
            if (!is_admin()) {
                header('Location: /login');
            }

            // Obtener los datos del formulario
            $nombre = $_POST['nombre'] ?? '';
            $descripcion = $_POST['descripcion'] ?? '';
            $fecha_inicio = $_POST['fecha_inicio'] ?? '';
            $fecha_finalizacion = $_POST['fecha_finalizacion'] ?? '';
            $estado = $_POST['estado'] ?? '';
            $prioridad = $_POST['prioridad'] ?? '';

            // Asignar los valores al objeto tarea
            $tarea->nombre = $nombre;
            $tarea->descripcion = $descripcion;
            $tarea->fecha_inicio = $fecha_inicio;
            $tarea->fecha_finalizacion = $fecha_finalizacion;
            $tarea->estado = $estado;
            $tarea->prioridad = $prioridad;

            // Validar la tarea
            $alertas = $tarea->validar();

            // Verificar si hay errores de validación
            if (empty($alertas['error'])) {
                // Guardar los cambios en la base de datos
                $resultado = $tarea->guardar();

                // Redireccionar si se guardaron los cambios correctamente
                if ($resultado) {
                    header('Location: /admin/tareas');
                    exit; // Salir después de redirigir
                }
                $alertas['error'][] = 'Error al guardar los cambios de la tarea';
            }
        }

        // Renderizar la vista de edición de la tarea
        $router->render('admin/tareas/editar', [
            'titulo' => 'Editar Tarea',
            'alertas' => $alertas,
            'tarea' => $tarea,
        ]);
    }


    public static function eliminar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!is_admin()) {
                header('Location: /login');
            }

            $id = $_POST['id'];
            $tarea = Tarea::find($id);
            if (!$tarea) {
                header('Location: /admin/tareas');
            }
            $resultado = $tarea->eliminar();
            if ($resultado) {
                header('Location: /admin/tareas');
            }
        }
    }
}
