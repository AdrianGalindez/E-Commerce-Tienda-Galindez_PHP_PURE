<!DOCTYPE html>
<html>
<head>
    <title>Editar Marca</title>
</head>
<body>
<h2>Editar Marca</h2>
<form method="POST" action="index.php?controller=Brand&action=update&id=<?= $brand['id'] ?>">
    <label>Nombre:</label><br>
    <input type="text" name="name" value="<?= $brand['name'] ?>" required><br>
    <button type="submit">Actualizar</button>
</form>
<a href="index.php?controller=Brand&action=index">Volver</a>
</body>
</html>