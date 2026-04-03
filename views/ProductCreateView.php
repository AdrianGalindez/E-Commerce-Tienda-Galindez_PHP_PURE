<!DOCTYPE html>
<html>
<head>
    <title>Crear Producto</title>
</head>
<body>
<h2>Crear Producto</h2>
<form method="POST" action="index.php?controller=Product&action=store">
    <label>Nombre:</label><br>
    <input type="text" name="name" required><br>
    <label>Precio:</label><br>
    <input type="number" step="0.01" name="price" required><br>
    <button type="submit">Guardar</button>
</form>
<a href="index.php?controller=Product&action=index">Volver</a>
</body>
</html>