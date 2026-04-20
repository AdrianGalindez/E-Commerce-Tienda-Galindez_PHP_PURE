<?php
require_once __DIR__ . '/../partials/header.php';
?>
<!-- /Header del Admin -->

<h2>Detalle de Venta #<?= $sale['id'] ?></h2>
<p>Cliente: <?= $sale['customer_name'] ?></p>
<p>Total: <?= $sale['total'] ?></p>

<h3>Productos</h3>
<table border="1">
    <tr>
        <th>Producto</th>
        <th>Cantidad</th>
        <th>Precio</th>
    </tr>
    <?php foreach($saleItems as $item): ?>
    <tr>
        <td><?= $item['name'] ?></td>
        <td><?= $item['quantity'] ?></td>
        <td><?= $item['price'] ?></td>
    </tr>
    <?php endforeach; ?>
</table>
<a href="index.php?controller=Sale&action=index">Volver</a>


<!-- FOOTER -->
<?php
require_once __DIR__ . '/../partials/footer.php';