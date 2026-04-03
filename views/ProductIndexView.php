<!DOCTYPE html>
<html>
<head>
    <title>Listado de Productos</title>
</head>
<body>
<h2>Productos</h2>
<a href="index.php?controller=Product&action=create">Crear Producto</a>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Precio</th>
        <th>Stock</th>
        <th>Categoría</th>
        <th>Marca</th>
        <th>Acciones</th>
    </tr>

<?php foreach($products as $p): ?>
<tr>
    <td><?= $p['id'] ?></td>
    <td><?= $p['nombre'] ?></td>
    <td><?= $p['descripcion'] ?></td>
    <td><?= $p['precio'] ?></td>
    <td><?= $p['stock'] ?></td>
    <td><?= $p['categoria'] ?></td>
    <td><?= $p['marca'] ?></td>
    <td>
        <a href="index.php?controller=Product&action=edit&id=<?= $p['id'] ?>">Editar</a> |
        <a href="index.php?controller=Product&action=delete&id=<?= $p['id'] ?>">Eliminar</a>
    </td>
</tr>
<?php endforeach; ?>
</table>
<a href="index.php?controller=Provider&action=index">Volver</a>
</body>
</html>