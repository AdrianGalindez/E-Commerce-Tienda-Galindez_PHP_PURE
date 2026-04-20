<?php
require_once __DIR__ . '/../partials/header.php';
?>
<!-- /Header del Admin -->

<h2>Editar Categoría</h2>

<form method="POST" action="index.php?controller=category&action=update">

    <!-- ID oculto -->
    <input type="hidden" name="id" value="<?= $category['id'] ?>">

    <label>Nombre:</label><br>
    <input type="text" name="nombre" value="<?= $category['nombre'] ?>" required><br>

    <button type="submit">Actualizar</button>

</form>



<!-- FOOTER -->
<?php
require_once __DIR__ . '/../partials/footer.php';