<?php require __DIR__ . '/header.php'; ?>

<section class="page-head">
  <h1>Registro de socio</h1>
  <p>Completa los datos para inscribir un nuevo socio en CR Gym.</p>
</section>

<?php if (!empty($mensaje)): ?>
  <div class="alerta <?php echo $exito ? 'alerta--exito' : 'alerta--error'; ?>">
    <?php echo htmlspecialchars($mensaje); ?>
  </div>
<?php endif; ?>

<form action="index.php?action=registrar" method="POST" id="formSocio" class="tarjeta form-registro" novalidate>

  <div class="campo">
    <label for="nombre">Nombre completo</label>
    <input type="text" id="nombre" name="nombre" placeholder="Ej. Juan Pérez"
           value="<?php echo htmlspecialchars($_POST['nombre'] ?? ''); ?>">
    <span class="campo__error" id="error-nombre"></span>
  </div>

  <div class="campo">
    <label for="cedula">Cédula</label>
    <input type="text" id="cedula" name="cedula" placeholder="10 dígitos" maxlength="10"
           value="<?php echo htmlspecialchars($_POST['cedula'] ?? ''); ?>">
    <span class="campo__error" id="error-cedula"></span>
  </div>

  <div class="campo">
    <label for="email">Correo electrónico</label>
    <input type="text" id="email" name="email" placeholder="correo@ejemplo.com"
           value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>">
    <span class="campo__error" id="error-email"></span>
  </div>

  <div class="campo">
    <label for="telefono">Teléfono</label>
    <input type="text" id="telefono" name="telefono" placeholder="Ej. 0991234567" maxlength="10"
           value="<?php echo htmlspecialchars($_POST['telefono'] ?? ''); ?>">
    <span class="campo__error" id="error-telefono"></span>
  </div>

  <div class="campo">
    <label for="tipo_membresia">Tipo de membresía</label>
    <select id="tipo_membresia" name="tipo_membresia">
      <option value="">Seleccione...</option>
      <option value="Básica">Básica</option>
      <option value="Premium">Premium</option>
      <option value="VIP">VIP</option>
    </select>
    <span class="campo__error" id="error-membresia"></span>
  </div>

  <div class="campo">
    <label for="fecha_inicio">Fecha de inicio</label>
    <input type="date" id="fecha_inicio" name="fecha_inicio"
           value="<?php echo htmlspecialchars($_POST['fecha_inicio'] ?? ''); ?>">
    <span class="campo__error" id="error-fecha"></span>
  </div>

  <button type="submit" class="boton boton--primario">Registrar socio</button>
</form>

<?php require __DIR__ . '/footer.php'; ?>
