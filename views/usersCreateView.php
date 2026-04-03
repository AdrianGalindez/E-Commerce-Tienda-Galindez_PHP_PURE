<!DOCTYPE html>
<html>
<head>
    <title>Crear Usuario</title>
</head>
<body>
<h2>Crear Usuario</h2>
<form method="POST" action="index.php?controller=user&action=store">
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
<a href="index.php?controller=user&action=index">Volver</a>
</body>
</html>