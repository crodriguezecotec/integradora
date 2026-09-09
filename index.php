<?php
// Punto de entrada único de la aplicación (front controller).
// Flujo: Vista -> Controlador -> Modelo -> Base de datos

require_once __DIR__ . '/controllers/SocioController.php';

$controlador = new SocioController();
$accion = $_GET['action'] ?? 'formulario';

switch ($accion) {
    case 'registrar':
        $controlador->registrar();
        break;

    case 'listar':
        $controlador->listar();
        break;

    case 'eliminar':
        $controlador->eliminar();
        break;

    case 'formulario':
    default:
        $controlador->mostrarFormulario();
        break;
}
