# CR Gym — Sistema de Socios (PHP + MySQL + MVC)

Aplicación web para el registro y consulta de socios de un gimnasio, desarrollada
con PHP, MySQL, HTML, CSS y JavaScript, siguiendo el patrón **Modelo–Vista–Controlador (MVC)**.

## Flujo de la aplicación

```
Vista (formulario/tabla) → Controlador (SocioController) → Modelo (SocioModel) → MySQL (integradora)
```

## Estructura del proyecto

```
integradora/
├── config/
│   └── conexion.php          # Conexión a MySQL (independiente)
├── controllers/
│   └── SocioController.php   # Recibe acciones y coordina vista/modelo
├── models/
│   └── SocioModel.php        # INSERT, SELECT, DELETE en la tabla socios
├── views/
│   ├── header.php
│   ├── footer.php
│   ├── registro.php          # Formulario de registro
│   └── listado.php           # Tabla de consulta + búsqueda + eliminar
├── public/
│   ├── css/estilos.css
│   └── js/validaciones.js    # Validaciones del formulario en el cliente
├── database/
│   └── integradora.sql       # Script de creación de la BD y tabla
├── index.php                 # Front controller (enruta las acciones)
└── README.md
```

## Instalación y ejecución (XAMPP / Laragon / WAMP)

1. Copia la carpeta `integradora/` dentro de `htdocs` (XAMPP).
2. Abre phpMyAdmin y ejecuta el script `database/integradora.sql`
   (crea la base de datos `integradora` y la tabla `socios`, con usuario `root` sin contraseña).
3. Verifica que `config/conexion.php` tenga los datos correctos (por defecto:
   host `localhost`, usuario `root`, sin clave, base `integradora`).
4. Abre en el navegador: `http://localhost/integradora/`.

## Funcionalidades

- **Registrar socio**: formulario con validaciones en JavaScript (campos vacíos,
  cédula numérica de 10 dígitos, formato de correo, teléfono numérico, fecha obligatoria)
  y validación de respaldo en PHP antes de insertar en la base de datos.
- **Consultar socios**: listado en tabla HTML con los datos almacenados.
- **Buscar socios**: por nombre, desde la misma vista de listado.
- **Eliminar socio**: acción disponible desde la tabla, con confirmación.

## Base de datos

- Nombre: `integradora`
- Tabla principal: `socios` (id, nombre, cedula, email, telefono, tipo_membresia,
  fecha_inicio, fecha_registro)

