// Validaciones del formulario de registro de socios (lado cliente).

document.addEventListener('DOMContentLoaded', function () {
  const form = document.getElementById('formSocio');
  if (!form) return;

  form.addEventListener('submit', function (evento) {
    let esValido = true;
    limpiarErrores();

    const nombre = document.getElementById('nombre').value.trim();
    const cedula = document.getElementById('cedula').value.trim();
    const email = document.getElementById('email').value.trim();
    const telefono = document.getElementById('telefono').value.trim();
    const membresia = document.getElementById('tipo_membresia').value;
    const fechaInicio = document.getElementById('fecha_inicio').value;

    // Nombre: obligatorio y longitud mínima
    if (nombre === '') {
      mostrarError('error-nombre', 'El nombre es obligatorio.');
      esValido = false;
    } else if (nombre.length < 3) {
      mostrarError('error-nombre', 'Debe tener al menos 3 caracteres.');
      esValido = false;
    }

    // Cédula: obligatoria, numérica, 10 dígitos
    if (cedula === '') {
      mostrarError('error-cedula', 'La cédula es obligatoria.');
      esValido = false;
    } else if (!/^\d+$/.test(cedula)) {
      mostrarError('error-cedula', 'Solo se permiten números.');
      esValido = false;
    } else if (cedula.length !== 10) {
      mostrarError('error-cedula', 'Debe tener 10 dígitos.');
      esValido = false;
    }

    // Correo: obligatorio y formato válido
    if (email === '') {
      mostrarError('error-email', 'El correo es obligatorio.');
      esValido = false;
    } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
      mostrarError('error-email', 'Formato de correo no válido.');
      esValido = false;
    }

    // Teléfono: obligatorio, numérico
    if (telefono === '') {
      mostrarError('error-telefono', 'El teléfono es obligatorio.');
      esValido = false;
    } else if (!/^\d{10}$/.test(telefono)) {
      mostrarError('error-telefono', 'Debe tener 10 dígitos.');
      esValido = false;
    }

    // Membresía: obligatoria
    if (membresia === '') {
      mostrarError('error-membresia', 'Selecciona un tipo de membresía.');
      esValido = false;
    }

    // Fecha de inicio: obligatoria
    if (fechaInicio === '') {
      mostrarError('error-fecha', 'La fecha de inicio es obligatoria.');
      esValido = false;
    }

    if (!esValido) {
      evento.preventDefault();
    }
  });

  function mostrarError(idSpan, texto) {
    const span = document.getElementById(idSpan);
    if (span) span.textContent = texto;
  }

  function limpiarErrores() {
    document.querySelectorAll('.campo__error').forEach(function (span) {
      span.textContent = '';
    });
  }
});
