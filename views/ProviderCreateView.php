<!DOCTYPE html>
<html>

<head>
<title>Crear Proveedor</title>
</head>

<body>

<h2>Crear Proveedor</h2>

<form action="index.php?controller=Provider&action=store" method="POST">

<label>Nombre</label>
<input type="text" name="nombre" required>

<br><br>

<label>Teléfono</label>
<input type="text" name="telefono" required>

<br><br>

<label>Dirección</label>
<input type="text" name="direccion" required>

<br><br>

<button type="submit">Guardar</button>

</form>

<br>

<a href="index.php?controller=Provider&action=index">Volver</a>

</body>
</html>