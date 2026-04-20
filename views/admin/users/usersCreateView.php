<?php
require_once __DIR__ . '/../partials/header.php';
?>
<!-- /Header del Admin -->

<h2>Crear Usuario</h2>
<form method="POST" action="index.php?controller=user&action=store">
    <select name="rol_id" required>
        <option value="">Seleccione rol</option>
    
        <?php foreach($roles as $r): ?>
            <option value="<?= $r['id'] ?>">
                <?= $r['nombre'] ?>
            </option>
        <?php endforeach; ?>
    
    </select><br>
    <label>Nombre:</label><br>
    <input type="text" name="nombre" required><br>
    <label>Email:</label><br>
    <input type="email" name="email" required><br>
    <label>Teléfono:</label><br>
    <input type="text" name="telefono"><br>
    <label>Contraseña:</label><br>
    <input type="password" name="password" required><br>
    <button type="submit">Guardar</button>
</form>

<!-- FOOTER -->
<?php
require_once __DIR__ . '/../partials/footer.php';