<!DOCTYPE html>
<html>
<head>
    <title>Listado de Proveedores</title>
</head>
<body>
<h2>Proveedores</h2>
<a href="index.php?controller=Provider&action=create">Crear Proveedor</a>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Acciones</th>
    </tr>
    <?php foreach($providers as $p): ?>
    <tr>
        <td><?= $p['id'] ?></td>
        <td><?= $p['name'] ?></td>
        <td>
            <a href="index.php?controller=Provider&action=edit&id=<?= $p['id'] ?>">Editar</a> |
            <a href="index.php?controller=Provider&action=delete&id=<?= $p['id'] ?>">Eliminar</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
<a href="index.php?controller=provider&action=index">Volver</a></body>
</html>