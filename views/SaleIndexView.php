<!DOCTYPE html>
<html>
<head>
    <title>Listado de Ventas</title>
</head>
<body>
<h2>Ventas</h2>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Cliente</th>
        <th>Total</th>
        <th>Acciones</th>
    </tr>
    <?php foreach($sales as $s): ?>
    <tr>
        <td><?= $s['id'] ?></td>
        <td><?= $s['customer_name'] ?></td>
        <td><?= $s['total'] ?></td>
        <td>
            <a href="index.php?controller=Sale&action=show&id=<?= $s['id'] ?>">Ver</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
<a href="index.php?controller=Dashboard&action=index">Volver</a>
</body>
</html>