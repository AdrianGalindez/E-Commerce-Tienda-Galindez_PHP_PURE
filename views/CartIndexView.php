<!DOCTYPE html>
<html>
<head>
    <title>Carrito de Compras</title>
</head>
<body>
<h2>Carrito de Compras</h2>
<?php if(empty($cartItems)): ?>
    <p>El carrito está vacío.</p>
<?php else: ?>
<table border="1">
    <tr>
        <th>Producto</th>
        <th>Cantidad</th>
        <th>Precio</th>
        <th>Subtotal</th>
        <th>Acciones</th>
    </tr>
    <?php foreach($cartItems as $item): ?>
    <tr>
        <td><?= $item['name'] ?></td>
        <td><?= $item['quantity'] ?></td>
        <td><?= $item['price'] ?></td>
        <td><?= $item['quantity'] * $item['price'] ?></td>
        <td>
            <a href="index.php?controller=Cart&action=remove&id=<?= $item['id'] ?>">Eliminar</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
<p>Total: <?= $total ?></p>
<a href="index.php?controller=Cart&action=checkout">Ir a Checkout</a>
<?php endif; ?>
<a href="index.php?controller=Dashboard&action=index">Volver</a>
</body>
</html>