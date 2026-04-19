<h2>Editar Rol</h2>

<form method="POST" action="index.php?controller=role&action=update">

    <input type="hidden" name="id" value="<?= $role['id'] ?>">

    <label>Nombre:</label><br>
    <input type="text" name="nombre" value="<?= $role['nombre'] ?>" required>

    <br><br>

    <button type="submit">Actualizar</button>
</form>