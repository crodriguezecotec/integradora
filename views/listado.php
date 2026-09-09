<?php require __DIR__ . '/header.php'; ?>

<section class="page-head">
  <h1>Socios registrados</h1>
  <p>Consulta, busca y administra los socios de Pulso Gym.</p>
</section>

<form action="index.php" method="GET" class="form-busqueda">
  <input type="hidden" name="action" value="listar">
  <input type="text" name="buscar" placeholder="Buscar por nombre..."
         value="<?php echo htmlspecialchars($texto ?? ''); ?>">
  <button type="submit" class="boton boton--secundario">Buscar</button>
</form>

<div class="tarjeta tabla-wrap">
  <table class="tabla-socios">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Cédula</th>
        <th>Correo</th>
        <th>Teléfono</th>
        <th>Membresía</th>
        <th>Inicio</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php if (count($socios) > 0): ?>
        <?php foreach ($socios as $socio): ?>
          <tr>
            <td><?php echo $socio['id']; ?></td>
            <td><?php echo htmlspecialchars($socio['nombre']); ?></td>
            <td><?php echo htmlspecialchars($socio['cedula']); ?></td>
            <td><?php echo htmlspecialchars($socio['email']); ?></td>
            <td><?php echo htmlspecialchars($socio['telefono']); ?></td>
            <td><span class="etiqueta"><?php echo htmlspecialchars($socio['tipo_membresia']); ?></span></td>
            <td><?php echo htmlspecialchars($socio['fecha_inicio']); ?></td>
            <td>
              <a href="index.php?action=eliminar&id=<?php echo $socio['id']; ?>"
                 class="boton boton--peligro"
                 onclick="return confirm('¿Eliminar a este socio?');">Eliminar</a>
            </td>
          </tr>
        <?php endforeach; ?>
      <?php else: ?>
        <tr>
          <td colspan="8" class="tabla-vacia">No hay socios registrados todavía.</td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>

<?php require __DIR__ . '/footer.php'; ?>
