<?php

namespace Model;

class Proyecto extends ActiveRecord
{
    protected static $tabla = 'proyectos';
    protected static $columnasDB = ['id', 'nombre', 'descripcion', 'fecha_inicio', 'fecha_finalizacion', 'participantes', 'estado', 'cliente', 'prioridad', 'archivo'];

    public $id;
    public $nombre;
    public $descripcion;
    public $fecha_inicio;
    public $fecha_finalizacion;
    public $participantes;
    public $estado;
    public $cliente;
    public $prioridad;
    public $archivo;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->fecha_inicio = $args['fecha_inicio'] ?? '';
        $this->fecha_finalizacion = $args['fecha_finalizacion'] ?? '';
        $this->participantes = $args['participantes'] ?? '';
        $this->estado = $args['estado'] ?? '';
        $this->cliente = $args['cliente'] ?? '';
        $this->prioridad = $args['prioridad'] ?? '';
        $this->archivo = $args['archivo'] ?? '';
    }

    public function validar()
    {
        if (!$this->nombre) {
            self::$alertas['error'][] = 'El Nombre es Obligatorio';
        }
        if (!$this->descripcion) {
            self::$alertas['error'][] = 'La descripción es Obligatoria';
        }
        if (!$this->fecha_inicio || !$this->validarFecha($this->fecha_inicio)) {
            self::$alertas['error'][] = 'La fecha de inicio no es válida';
        }
        if (!$this->fecha_finalizacion || !$this->validarFecha($this->fecha_finalizacion)) {
            self::$alertas['error'][] = 'La fecha de finalización no es válida';
        }
        if (!$this->participantes) {
            self::$alertas['error'][] = 'El campo Participantes es obligatorio';
        }
        if (!$this->estado) {
            self::$alertas['error'][] = 'El campo Estado es obligatorio';
        }
        if (!$this->cliente) {
            self::$alertas['error'][] = 'El campo Cliente es obligatorio';
        }
        if (!$this->prioridad || !in_array($this->prioridad, ['alta', 'media', 'baja'])) {
            self::$alertas['error'][] = 'La prioridad seleccionada no es válida';
        }

        return self::$alertas;
    }

    private function validarFecha($fecha)
    {
        $date = \DateTime::createFromFormat('Y-m-d', $fecha);
        return $date && $date->format('Y-m-d') === $fecha;
    }
}
