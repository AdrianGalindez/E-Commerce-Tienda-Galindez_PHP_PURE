<!DOCTYPE html>
<html>
<head>
    <title>Editar Categoría</title>
</head>
<body>
<h2>Editar Categoría</h2>
<form method="POST" action="index.php?controller=Category&action=update&id=<?= $category['id'] ?>">
    <label>Nombre:</label><br>
    <input type="text" name="name" value="<?= $category['name'] ?>" required><br>
    <button type="submit">Actualizar</button>
</form>
<a href="index.php?controller=Category&action=index">Volver</a>
</body>
</html>