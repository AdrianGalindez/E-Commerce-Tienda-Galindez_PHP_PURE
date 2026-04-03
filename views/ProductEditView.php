<!DOCTYPE html>
<html>
<head>
    <title>Editar Producto</title>
</head>
<body>
<h2>Editar Producto</h2>
<form method="POST" action="index.php?controller=Product&action=update">
    
    <input type="hidden" name="id" value="<?= $product['id'] ?>">

    <label>Nombre:</label><br>
    <input type="text" name="nombre" value="<?= $product['nombre'] ?>" required><br>

    <label>Precio:</label><br>
    <input type="number" step="0.01" name="precio" value="<?= $product['precio'] ?>" required><br>

    <button type="submit">Actualizar</button>
</form>
<a href="index.php?controller=Product&action=index">Volver</a>
</body>
</html>