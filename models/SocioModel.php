<?php
// MODELO
// Responsable de comunicarse con MySQL: insertar, consultar, buscar y eliminar socios.

require_once __DIR__ . '/../config/conexion.php';

class SocioModel
{
    private $conexion;

    public function __construct()
    {
        global $conexion;
        $this->conexion = $conexion;
    }

    public function insertar($nombre, $cedula, $email, $telefono, $tipoMembresia, $fechaInicio)
    {
        $stmt = $this->conexion->prepare(
            "INSERT INTO socios (nombre, cedula, email, telefono, tipo_membresia, fecha_inicio)
             VALUES (?, ?, ?, ?, ?, ?)"
        );
        $stmt->bind_param('ssssss', $nombre, $cedula, $email, $telefono, $tipoMembresia, $fechaInicio);
        $resultado = $stmt->execute();
        $stmt->close();

        return $resultado;
    }

    public function obtenerTodos()
    {
        $resultado = $this->conexion->query('SELECT * FROM socios ORDER BY id DESC');
        $socios = [];
        while ($fila = $resultado->fetch_assoc()) {
            $socios[] = $fila;
        }

        return $socios;
    }

    public function buscarPorNombre($texto)
    {
        $like = '%' . $texto . '%';
        $stmt = $this->conexion->prepare(
            'SELECT * FROM socios WHERE nombre LIKE ? ORDER BY id DESC'
        );
        $stmt->bind_param('s', $like);
        $stmt->execute();
        $resultado = $stmt->get_result();

        $socios = [];
        while ($fila = $resultado->fetch_assoc()) {
            $socios[] = $fila;
        }
        $stmt->close();

        return $socios;
    }

    public function eliminar($id)
    {
        $stmt = $this->conexion->prepare('DELETE FROM socios WHERE id = ?');
        $stmt->bind_param('i', $id);
        $resultado = $stmt->execute();
        $stmt->close();

        return $resultado;
    }
}
