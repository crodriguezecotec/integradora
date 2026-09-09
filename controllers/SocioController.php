<?php
// CONTROLADOR
// Recibe las acciones del usuario (formulario, registrar, listar, eliminar)
// y coordina la comunicación entre la vista y el modelo.

require_once __DIR__ . '/../models/SocioModel.php';

class SocioController
{
    private $model;

    public function __construct()
    {
        $this->model = new SocioModel();
    }

    public function mostrarFormulario()
    {
        $mensaje = '';
        $exito = false;
        require __DIR__ . '/../views/registro.php';
    }

    public function registrar()
    {
        $mensaje = '';
        $exito = false;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = trim($_POST['nombre'] ?? '');
            $cedula = trim($_POST['cedula'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $telefono = trim($_POST['telefono'] ?? '');
            $tipoMembresia = trim($_POST['tipo_membresia'] ?? '');
            $fechaInicio = trim($_POST['fecha_inicio'] ?? '');

            if ($nombre === '' || $cedula === '' || $email === '' || $telefono === '' || $tipoMembresia === '' || $fechaInicio === '') {
                $mensaje = 'Todos los campos son obligatorios.';
            } elseif (strlen($nombre) < 3) {
                $mensaje = 'El nombre debe tener al menos 3 caracteres.';
            } elseif (!ctype_digit($cedula) || strlen($cedula) !== 10) {
                $mensaje = 'La cédula debe contener 10 dígitos numéricos.';
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $mensaje = 'El correo electrónico no tiene un formato válido.';
            } elseif (!preg_match('/^\d{7,10}$/', $telefono)) {
                $mensaje = 'El teléfono debe tener entre 7 y 10 dígitos.';
            } else {
                $exito = $this->model->insertar($nombre, $cedula, $email, $telefono, $tipoMembresia, $fechaInicio);
                $mensaje = $exito
                    ? 'Socio registrado correctamente.'
                    : 'Ocurrió un error al registrar el socio.';
            }
        }

        require __DIR__ . '/../views/registro.php';
    }

    public function listar()
    {
        $texto = trim($_GET['buscar'] ?? '');
        $socios = $texto !== '' ? $this->model->buscarPorNombre($texto) : $this->model->obtenerTodos();
        require __DIR__ . '/../views/listado.php';
    }

    public function eliminar()
    {
        $id = intval($_GET['id'] ?? 0);
        if ($id > 0) {
            $this->model->eliminar($id);
        }
        header('Location: index.php?action=listar');
        exit;
    }
}
