<?php
require_once __DIR__ . '/partials/header.php';
require_once __DIR__ . '/partials/carousel.php';
?>

<div class="container mt-4">
    <h1>Carrito de Compras</h1>
    <p>Revisa los productos que has agregado a tu carrito de compras y realiza el checkout cuando estés listo.</p>
</div>

<main class="container mt-4">
<div class="row">

    <!-- PRODUCTOS -->
    <div class="col-md-8">

        <div class="d-flex justify-content-between mb-3">
            <h2>Tu Despensa</h2>
            <span class="badge bg-primary">
                <?= count($productosCarrito) ?> Artículos
            </span>
        </div>

        <?php if(empty($productosCarrito)): ?>
            <p>Tu carrito está vacío.</p>
        <?php endif; ?>

        <?php foreach($productosCarrito as $producto): ?>

        <div class="card mb-3 p-3 d-flex flex-row align-items-center">

            <!-- Imagen -->
            <img 
                src="<?= !empty($producto['foto']) ? $producto['foto'] : '/assets/img/default.jpg' ?>" 
                width="80"
            >

            <!-- Info -->
            <div class="ms-3 flex-grow-1">
                <h5><?= $producto['nombre'] ?></h5>
                <p class="text-muted">
                    <?= $producto['categoria'] ?? 'Sin categoría' ?>
                </p>
            </div>

            <!-- Cantidad -->
            <div class="d-flex align-items-center">

                <!-- Disminuir -->
                <form action="index.php?controller=cart&action=update" method="POST">
                    <input type="hidden" name="producto_id" value="<?= $producto['id'] ?>">
                    <input type="hidden" name="cantidad" value="<?= $producto['cantidad'] - 1 ?>">
                    <button class="btn btn-sm btn-secondary">-</button>
                </form>

                <input type="number" value="<?= $producto['cantidad'] ?>" readonly class="mx-2" style="width:60px;">

                <!-- Aumentar -->
                <form action="index.php?controller=cart&action=update" method="POST">
                    <input type="hidden" name="producto_id" value="<?= $producto['id'] ?>">
                    <input type="hidden" name="cantidad" value="<?= $producto['cantidad'] + 1 ?>">
                    <button class="btn btn-sm btn-secondary">+</button>
                </form>

            </div>

            <!-- Precio -->
            <div class="ms-3">
                $<?= number_format($producto['precio'] * $producto['cantidad'], 2) ?>
            </div>

            <!-- Eliminar -->
            <form action="index.php?controller=cart&action=delete" method="POST" class="ms-3">
                <input type="hidden" name="producto_id" value="<?= $producto['id'] ?>">
                <button class="btn btn-danger btn-sm">✕</button>
            </form>

        </div>

        <?php endforeach; ?>

    </div>

    <!-- RESUMEN -->
    <div class="col-md-4">

        <div class="card p-3">

            <h3>Resumen</h3>
            <hr>

            <div class="d-flex justify-content-between">
                <span>Subtotal</span>
                <span>$<?= number_format($subtotal, 2) ?></span>
            </div>

            <div class="d-flex justify-content-between">
                <span>Envío</span>
                <span class="text-success">Gratis</span>
            </div>

            <hr>

            <div class="d-flex justify-content-between fw-bold">
                <span>Total</span>
                <span>$<?= number_format($subtotal, 2) ?></span>
            </div>

            <!-- Checkout -->
            <a href="index.php?controller=payment&action=checkout" class="btn btn-success">Proceder al pago</a>

        </div>

    </div>

</div>
</main>

<!-- FOOTER -->
<?php
require_once __DIR__ . '/partials/footer.php';?>