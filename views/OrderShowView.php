<!DOCTYPE html>
<html>
<head>
    <title>Detalle de Orden</title>
</head>
<body>
<h2>Detalle de Orden #<?= $order['id'] ?></h2>
<p>Cliente: <?= $order['customer_name'] ?></p>
<p>Dirección: <?= $order['address'] ?></p>
<p>Método de pago: <?= $order['payment_method'] ?></p>

<h3>Productos</h3>
<table border="1">
    <tr>
        <th>Producto</th>
        <th>Cantidad</th>
        <th>Precio</th>
        <th>Subtotal</th>
    </tr>
    <?php foreach($orderItems as $item): ?>
    <tr>
        <td><?= $item['name'] ?></td>
        <td><?= $item['quantity'] ?></td>
        <td><?= $item['price'] ?></td>
        <td><?= $item['quantity'] * $item['price'] ?></td>
    </tr>
    <?php endforeach; ?>
</table>
<p>Total: <?= $order['total'] ?></p>
<a href="index.php?controller=Dashboard&action=index">Volver</a>
</body>
</html>