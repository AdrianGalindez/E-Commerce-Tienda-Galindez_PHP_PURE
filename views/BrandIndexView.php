<!DOCTYPE html>
<html>
<head>
    <title>Listado de Marcas</title>
</head>
<body>
<h2>Marcas</h2>
<a href="index.php?controller=Brand&action=create">Crear Marca</a>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Acciones</th>
    </tr>
    <?php foreach($brands as $b): ?>
    <tr>
        <td><?= $b['id'] ?></td>
        <td><?= $b['name'] ?></td>
        <td>
            <a href="index.php?controller=Brand&action=edit&id=<?= $b['id'] ?>">Editar</a> |
            <a href="index.php?controller=Brand&action=delete&id=<?= $b['id'] ?>">Eliminar</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
<a href="index.php?controller=Dashboard&action=index">Volver</a>
</body>
</html>