<!DOCTYPE html>
<html>
<head>
    <title>Listado de Categorías</title>
</head>
<body>
<h2>Categorías</h2>
<a href="index.php?controller=Category&action=create">Crear Categoría</a>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Acciones</th>
    </tr>
<?php foreach($categories as $c): ?>
<tr>
    <td><?= $c['id'] ?></td>
    <td><?= $c['nombre'] ?></td>
    <td>
        <a href="index.php?controller=Category&action=edit&id=<?= $c['id'] ?>">Editar</a> |
        <a href="index.php?controller=Category&action=delete&id=<?= $c['id'] ?>">Eliminar</a>
    </td>
</tr>
<?php endforeach; ?>
</table>
<a href="index.php?controller=Dashboard&action=index">Volver</a>
</body>
</html>