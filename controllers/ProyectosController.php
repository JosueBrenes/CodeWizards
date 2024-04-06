<?php

namespace Controllers;

use Classes\Paginacion;
use MVC\Router;
use Model\Proyecto;

class ProyectosController
{

    public static function index(Router $router)
    {
        if (!is_admin()) {
            header('Location: /login');
        }

        $pagina_actual = $_GET['page'];
        $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);

        if (!$pagina_actual || $pagina_actual < 1) {
            header('Location: /admin/proyectos?page=1');
        }
        $registros_por_pagina = 5;
        $total = Proyecto::total();
        $paginacion = new Paginacion($pagina_actual, $registros_por_pagina, $total);

        if ($paginacion->total_paginas() < $pagina_actual) {
            header('Location: /admin/proyectos?page=1');
        }

        $proyectos = Proyecto::paginar($registros_por_pagina, $paginacion->offset());

        $router->render('admin/proyectos/index', [
            'titulo' => 'Proyectos',
            'proyectos' => $proyectos,
            'paginacion' => $paginacion->paginacion()
        ]);
    }

    public static function crear(Router $router)
    {
        if (!is_admin()) {
            header('Location: /login');
        }

        $alertas = [];
        $proyecto = new Proyecto;

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
            $participantes = $_POST['participantes'] ?? '';
            $estado = $_POST['estado'] ?? '';
            $cliente = $_POST['cliente'] ?? '';
            $prioridad = $_POST['prioridad'] ?? '';
            $archivo = $_FILES['archivo'] ?? '';

            // Asignar los valores al objeto proyecto
            $proyecto->nombre = $nombre;
            $proyecto->descripcion = $descripcion;
            $proyecto->fecha_inicio = $fecha_inicio;
            $proyecto->fecha_finalizacion = $fecha_finalizacion;
            $proyecto->participantes = $participantes;
            $proyecto->estado = $estado;
            $proyecto->cliente = $cliente;
            $proyecto->prioridad = $prioridad;

            // Validar el proyecto
            $alertas = $proyecto->validar();

            // Verificar si hay errores de validación
            if (empty($alertas['error'])) {
                // Subir el archivo si se proporcionó
                if ($archivo && $archivo['tmp_name']) {
                    $ruta_archivo = '../uploads/' . $archivo['name'];
                    move_uploaded_file($archivo['tmp_name'], $ruta_archivo);
                    $proyecto->archivo = $ruta_archivo;
                }

                // Guardar el proyecto en la base de datos
                $resultado = $proyecto->guardar();

                // Redireccionar si se guardó correctamente
                if ($resultado) {
                    header('Location: /admin/proyectos');
                    exit;
                }
                $alertas['error'][] = 'Error al guardar el proyecto';
            }
        }

        // Renderizar la vista del formulario de creación de proyectos
        $router->render('admin/proyectos/crear', [
            'titulo' => 'Registrar Proyecto',
            'alertas' => $alertas,
            'proyecto' => $proyecto,
        ]);
    }



    public static function editar(Router $router)
    {
        if (!is_admin()) {
            header('Location: /login');
        }

        $alertas = [];
        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if (!$id) {
            header('Location: /admin/proyectos');
        }

        $proyecto = Proyecto::find($id);

        if (!$proyecto) {
            header('Location: /admin/proyectos');
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
            $participantes = $_POST['participantes'] ?? '';
            $estado = $_POST['estado'] ?? '';
            $cliente = $_POST['cliente'] ?? '';
            $prioridad = $_POST['prioridad'] ?? '';
            $archivo = $_FILES['archivo'] ?? '';

            // Asignar los valores al objeto proyecto
            $proyecto->nombre = $nombre;
            $proyecto->descripcion = $descripcion;
            $proyecto->fecha_inicio = $fecha_inicio;
            $proyecto->fecha_finalizacion = $fecha_finalizacion;
            $proyecto->participantes = $participantes;
            $proyecto->estado = $estado;
            $proyecto->cliente = $cliente;
            $proyecto->prioridad = $prioridad;

            // Validar el proyecto
            $alertas = $proyecto->validar();

            // Verificar si se proporcionó un archivo y si se cargó correctamente
            if ($archivo && $archivo['tmp_name']) {
                // Subir el archivo
                $ruta_archivo = '../uploads/' . $archivo['name'];
                move_uploaded_file($archivo['tmp_name'], $ruta_archivo);
                // Asignar la ruta del archivo al proyecto
                $proyecto->archivo = $ruta_archivo;
            }

            // Verificar si hay errores de validación
            if (empty($alertas['error'])) {
                // Guardar los cambios en la base de datos
                $resultado = $proyecto->guardar();

                // Redireccionar si se guardaron los cambios correctamente
                if ($resultado) {
                    header('Location: /admin/proyectos');
                    exit;
                }
                $alertas['error'][] = 'Error al guardar los cambios del proyecto';
            }
        }

        // Renderizar la vista del formulario de edición de proyectos
        $router->render('admin/proyectos/editar', [
            'titulo' => 'Actualizar Proyecto',
            'alertas' => $alertas,
            'proyecto' => $proyecto,
        ]);
    }

    public static function eliminar()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!is_admin()) {
                header('Location: /login');
            }

            $id = $_POST['id'];
            $proyecto = Proyecto::find($id);
            if (!isset($proyecto)) {
                header('Location: /admin/proyectos');
            }
            $resultado = $proyecto->eliminar();
            if ($resultado) {
                header('Location: /admin/proyectos');
            }
        }
    }
}
