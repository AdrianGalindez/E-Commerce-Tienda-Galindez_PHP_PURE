<!DOCTYPE html>
<html>
<head>
    <title>Detalle Producto</title>
</head>
<body>
<h2>Detalle Producto</h2>
<p>ID: <?= $product['id'] ?></p>
<p>Nombre: <?= $product['name'] ?></p>
<p>Precio: <?= $product['price'] ?></p>
<a href="index.php?controller=Product&action=index">Volver</a>
</body>
</html>