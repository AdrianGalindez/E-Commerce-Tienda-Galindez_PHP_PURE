<?php
require_once __DIR__ . '/../partials/header.php';
?>
<!-- /Header del Admin -->

<h2>Crear Proveedor</h2>

<form action="<?= BASE_URL ?>index.php?controller=provider&action=store" method="POST">

    <label>Nombre</label><br>
    <input type="text" name="nombre" required><br><br>

    <label>Teléfono</label><br>
    <input type="text" name="telefono" required><br><br>

    <label>Dirección</label><br>
    <input type="text" name="direccion" required><br><br>

    <button type="submit">Guardar</button>

</form>

<br>


<!-- FOOTER -->
<?php
require_once __DIR__ . '/../partials/footer.php';