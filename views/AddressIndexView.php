<!DOCTYPE html>
<html>
<head>
    <title>Direcciones</title>
</head>
<body>
<h2>Direcciones de Usuario</h2>
<a href="index.php?controller=Address&action=create">Agregar Dirección</a>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Dirección</th>
        <th>Ciudad</th>
        <th>Acciones</th>
    </tr>
    <?php foreach($addresses as $a): ?>
    <tr>
        <td><?= $a['id'] ?></td>
        <td><?= $a['address'] ?></td>
        <td><?= $a['city'] ?></td>
        <td>
            <a href="index.php?controller=Address&action=edit&id=<?= $a['id'] ?>">Editar</a> |
            <a href="index.php?controller=Address&action=delete&id=<?= $a['id'] ?>">Eliminar</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
<a href="index.php?controller=Dashboard&action=index">Volver</a>
</body>
</html>