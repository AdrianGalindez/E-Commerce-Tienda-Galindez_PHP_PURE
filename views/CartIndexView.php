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
        <td><?= $item['nombre'] ?></td>
        <td><?= $item['cantidad'] ?></td>
        <td><?= $item['precio'] ?></td>
        <td><?= $item['cantidad'] * $item['precio'] ?></td>
        <td>
            <a href="index.php?controller=Cart&action=remove&id=<?= $item['id'] ?>">
                Eliminar
            </a>
        </td>
    </tr>
    <?php endforeach; ?>

</table>

<p><strong>Total: <?= $total ?></strong></p>

<a href="index.php?controller=Cart&action=checkout">Ir a Checkout</a>

<?php endif; ?>

<br><br>
<a href="index.php?controller=Dashboard&action=index">Volver</a>

</body>
</html>