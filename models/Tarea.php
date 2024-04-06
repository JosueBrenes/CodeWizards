<?php

namespace Model;

class Tarea extends ActiveRecord
{
    protected static $tabla = 'tareas';
    protected static $columnasDB = ['id', 'nombre', 'descripcion', 'fecha_inicio', 'fecha_finalizacion', 'estado', 'prioridad'];
    protected static $alertas = ['error' => []]; // Definir la propiedad $alertas

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->fecha_inicio = $args['fecha_inicio'] ?? '';
        $this->fecha_finalizacion = $args['fecha_finalizacion'] ?? '';
        $this->estado = $args['estado'] ?? '';
        $this->prioridad = $args['prioridad'] ?? '';
    }

    public function validar()
    {
        if (!$this->nombre) {
            self::$alertas['error'][] = 'El Nombre es Obligatorio';
        }

        if (!$this->descripcion) {
            self::$alertas['error'][] = 'La Descripción es Obligatoria';
        }

        if (!$this->fecha_inicio) {
            self::$alertas['error'][] = 'La Fecha de Inicio es Obligatoria';
        }

        if (!$this->fecha_finalizacion) {
            self::$alertas['error'][] = 'La Fecha de Finalización es Obligatoria';
        }

        if (strtotime($this->fecha_finalizacion) < strtotime($this->fecha_inicio)) {
            self::$alertas['error'][] = 'La Fecha de Finalización debe ser posterior a la Fecha de Inicio';
        }

        if (!$this->estado) {
            self::$alertas['error'][] = 'El Estado es Obligatorio';
        }

        if (!$this->prioridad) {
            self::$alertas['error'][] = 'La Prioridad es Obligatoria';
        }

        return self::$alertas;
    }
}
