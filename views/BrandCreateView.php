<!DOCTYPE html>
<html>
<head>
    <title>Crear Marca</title>
</head>
<body>
<h2>Crear Marca</h2>
<form method="POST" action="index.php?controller=Brand&action=store">
    <label>Nombre:</label><br>
    <input type="text" name="name" required><br>
    <button type="submit">Guardar</button>
</form>
<a href="index.php?controller=Brand&action=index">Volver</a>
</body>
</html>