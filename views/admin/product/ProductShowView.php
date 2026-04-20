<?php
require_once __DIR__ . '/../partials/header.php';
?>
<!-- /Header del Admin -->

<h2>Detalle Producto</h2>
<p>ID: <?= $product['id'] ?></p>
<p>Nombre: <?= $product['nombre'] ?></p>
<p>Precio: <?= $product['precio'] ?></p>


<!-- FOOTER -->
<?php
require_once __DIR__ . '/../partials/footer.php';