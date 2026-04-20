<?php
require_once __DIR__ . '/../partials/header.php';
?>
<!-- /Header del Admin -->

<h2>Editar Proveedor</h2>

<form action="index.php?controller=provider&action=update" method="POST">

    <input type="hidden" name="id" value="<?= $provider['id'] ?>">

    <label>Nombre</label><br>
    <input type="text" name="nombre" value="<?= $provider['nombre'] ?>" required><br><br>

    <label>Teléfono</label><br>
    <input type="text" name="telefono" value="<?= $provider['telefono'] ?>" required><br><br>

    <label>Dirección</label><br>
    <input type="text" name="direccion" value="<?= $provider['direccion'] ?>" required><br><br>

    <button type="submit">Actualizar</button>

</form>


<!-- FOOTER -->
<?php
require_once __DIR__ . '/../partials/footer.php';