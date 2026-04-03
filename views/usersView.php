<!DOCTYPE html>
<html>
<head>
    <title>Usuarios</title>
</head>
<body>
<h2>Listado de Usuarios</h2>
<a href="index.php?controller=user&action=create">Agregar Usuario</a>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Email</th>
        <th>Teléfono</th>
        <th>Acciones</th>
    </tr>
    <?php foreach($users as $user): ?>
    <tr>
        <td><?= $user['id'] ?></td>
        <td><?= $user['nombre'] ?></td>
        <td><?= $user['email'] ?></td>
        <td><?= $user['telefono'] ?></td>
        <td>
            <a href="index.php?controller=user&action=edit&id=<?= $user['id'] ?>">Editar</a> |
            <a href="index.php?controller=user&action=delete&id=<?= $user['id'] ?>">Eliminar</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
<a href="index.php">Volver al Dashboard</a>
</body>
</html>