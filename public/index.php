<?php

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\AuthController;
use Controllers\ProyectosController;
use Controllers\PaginasController;
use Controllers\tareasController;
use Controllers\DashboardController;

$router = new Router();

// Login
$router->get('/login', [AuthController::class, 'login']);
$router->post('/login', [AuthController::class, 'login']);
$router->post('/logout', [AuthController::class, 'logout']);

// Crear Cuenta
$router->get('/registro', [AuthController::class, 'registro']);
$router->post('/registro', [AuthController::class, 'registro']);

// Formulario de olvide mi password
$router->get('/olvide', [AuthController::class, 'olvide']);
$router->post('/olvide', [AuthController::class, 'olvide']);

// Colocar el nuevo password
$router->get('/reestablecer', [AuthController::class, 'reestablecer']);
$router->post('/reestablecer', [AuthController::class, 'reestablecer']);

// Confirmación de Cuenta
$router->get('/mensaje', [AuthController::class, 'mensaje']);
$router->get('/confirmar-cuenta', [AuthController::class, 'confirmar']);


// Area de administración
$router->get('/admin/dashboard', [DashboardController::class, 'index']);

$router->get('/admin/tareas', [TareasController::class, 'index']);
$router->get('/admin/tareas/crear', [TareasController::class, 'crear']);
$router->post('/admin/tareas/crear', [TareasController::class, 'crear']);
$router->get('/admin/tareas/editar', [TareasController::class, 'editar']);
$router->post('/admin/tareas/editar', [TareasController::class, 'editar']);
$router->post('/admin/tareas/eliminar', [TareasController::class, 'eliminar']);

$router->get('/admin/proyectos', [ProyectosController::class, 'index']);
$router->get('/admin/proyectos/crear', [ProyectosController::class, 'crear']);
$router->post('/admin/proyectos/crear', [proyectosController::class, 'crear']);
$router->get('/admin/proyectos/editar', [proyectosController::class, 'editar']);
$router->post('/admin/proyectos/editar', [proyectosController::class, 'editar']);
$router->post('/admin/proyectos/eliminar', [proyectosController::class, 'eliminar']);

// Área Pública
$router->get('/', [PaginasController::class, 'index']);
$router->get('/404', [PaginasController::class, 'error']);

$router->comprobarRutas();
