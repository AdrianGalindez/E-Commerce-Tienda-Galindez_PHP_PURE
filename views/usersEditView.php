<!DOCTYPE html>
<html>
<head>
    <title>Editar Usuario</title>
</head>
<body>
<h2>Editar Usuario</h2>
<form method="POST" action="index.php?controller=user&action=update">
    <input type="hidden" name="id" value="<?= $user['id'] ?>">
    <label>Nombre:</label><br>
    <input type="text" name="nombre" value="<?= $user['nombre'] ?>" required><br>
    <label>Email:</label><br>
    <input type="email" name="email" value="<?= $user['email'] ?>" required><br>
    <label>Teléfono:</label><br>
    <input type="text" name="telefono" value="<?= $user['telefono'] ?>"><br>
    <button type="submit">Actualizar</button>
</form>
<a href="index.php?controller=user&action=index">Volver</a>
</body>
</html>