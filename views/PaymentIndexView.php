<!DOCTYPE html>
<html>
<head>
    <title>Pagos</title>
</head>
<body>
<h2>Pagos</h2>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Cliente</th>
        <th>Monto</th>
        <th>Método</th>
        <th>Fecha</th>
    </tr>
    <?php foreach($payments as $p): ?>
    <tr>
        <td><?= $p['id'] ?></td>
        <td><?= $p['customer_name'] ?></td>
        <td><?= $p['amount'] ?></td>
        <td><?= $p['method'] ?></td>
        <td><?= $p['date'] ?></td>
    </tr>
    <?php endforeach; ?>
</table>
<a href="index.php?controller=Dashboard&action=index">Volver</a>
</body>
</html>