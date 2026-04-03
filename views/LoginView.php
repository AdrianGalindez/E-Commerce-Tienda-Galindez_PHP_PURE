<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
<h2>Login</h2>
    <li><a href="index.php?controller=Product&action=index">Productos</a></li>
    <li><a href="index.php?controller=Category&action=index">Categorías</a></li>
    <li><a href="index.php?controller=Brand&action=index">Marcas</a></li>
    <li><a href="index.php?controller=Provider&action=index">Proveedores</a></li>
    <li><a href="index.php?controller=Cart&action=index">Carrito</a></li>
    <li><a href="index.php?controller=Sale&action=index">Ventas</a></li>
</ul>
<form method="POST" action="index.php?controller=Auth&action=login">
    <label>Email:</label><br>
    <input type="email" name="email" required><br>
    <label>Password:</label><br>
    <input type="password" name="password" required><br>
    <button type="submit">Ingresar</button>
</form>
<p><a href="index.php?controller=Auth&action=register">Registrarse</a></p>
</body>
</html>