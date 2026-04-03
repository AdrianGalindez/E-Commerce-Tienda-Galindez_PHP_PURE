<!DOCTYPE html>
<html>
<head>
    <title>Crear Categoría</title>
</head>
<body>
<h2>Crear Categoría</h2>
<form method="POST" action="index.php?controller=Category&action=store">
    <label>Nombre:</label><br>
    <input type="text" name="name" required><br>
    <button type="submit">Guardar</button>
</form>
<a href="index.php?controller=Category&action=index">Volver</a>
</body>
</html>