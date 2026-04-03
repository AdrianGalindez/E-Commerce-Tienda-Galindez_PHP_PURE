<!DOCTYPE html>
<html>
<head>
    <title>Editar Producto</title>
</head>
<body>
<h2>Editar Producto</h2>
<form method="POST" action="index.php?controller=Product&action=update&id=<?= $product['id'] ?>">
    <label>Nombre:</label><br>
    <input type="text" name="name" value="<?= $product['name'] ?>" required><br>
    <label>Precio:</label><br>
    <input type="number" step="0.01" name="price" value="<?= $product['price'] ?>" required><br>
    <button type="submit">Actualizar</button>
</form>
<a href="index.php?controller=Product&action=index">Volver</a>
</body>
</html>