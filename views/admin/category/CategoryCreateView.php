
<?php
require_once __DIR__ . '/../partials/header.php';
?>


<h2>Crear Categoría</h2>
<form method="POST" action="index.php?controller=Category&action=store">
    <label>Nombre:</label><br>
    <input type="text" name="nombre" required><br>
    <button type="submit">Guardar</button>
</form>


<?php
require_once __DIR__ . '/../partials/footer.php';
