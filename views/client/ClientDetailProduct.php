<?php
require_once __DIR__ . '/partials/header.php';
require_once __DIR__ . '/partials/carousel.php';
?>

<div class="container mt-5">
<div class="row">

    <!-- 🔥 CARRUSEL -->
    <div class="col-md-6">

        <div id="carouselProducto" class="carousel slide">

            <div class="carousel-inner">

                <?php if(!empty($product['fotos'])): ?>

                    <?php foreach($product['fotos'] as $index => $foto): ?>
                        <div class="carousel-item <?= $index == 0 ? 'active' : '' ?>">
                            <img src="<?= $foto ?>" class="d-block w-100" style="height:400px;object-fit:cover;">
                        </div>
                    <?php endforeach; ?>

                <?php elseif(!empty($product['foto'])): ?>

                    <div class="carousel-item active">
                        <img src="<?= $product['foto'] ?>" class="d-block w-100" style="height:400px;object-fit:cover;">
                    </div>

                <?php else: ?>

                    <div class="carousel-item active">
                        <img src="/assets/img/default.jpg" class="d-block w-100">
                    </div>

                <?php endif; ?>

            </div>

            <button class="carousel-control-prev" data-bs-target="#carouselProducto" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>

            <button class="carousel-control-next" data-bs-target="#carouselProducto" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>

        </div>

    </div>

    <!-- 🧾 INFO -->
    <div class="col-md-6">

        <h2><?= $product['nombre'] ?></h2>

        <p class="text-muted">
            Marca: <strong><?= $product['marca'] ?? 'N/A' ?></strong>
        </p>

        <p>
            Categoría: <strong><?= $product['categoria'] ?? 'N/A' ?></strong>
        </p>

        <h3 class="text-success">$ <?= $product['precio'] ?></h3>

        <p>
            <?= !empty($product['descripcion']) ? $product['descripcion'] : 'Sin descripción disponible' ?>
        </p>

        <ul class="list-group mb-3">
            <li class="list-group-item">
                Stock disponible: <strong><?= $product['stock'] ?></strong>
            </li>
            <li class="list-group-item">
                Fecha ingreso: <?= $product['fecha_ingreso'] ?>
            </li>
        </ul>

        <!-- BOTONES -->
        <div class="mt-3">

            <form action="index.php?controller=cart&action=add" method="POST" style="display:inline;">
                <input type="hidden" name="producto_id" value="<?= $product['id'] ?>">
                <button class="btn btn-primary">🛒 Agregar al carrito</button>
            </form>

            <a href="index.php" class="btn btn-secondary">Volver</a>

        </div>

    </div>

</div>
</div>

<hr class="container">

<!-- ⭐ RESEÑAS -->
<div class="container">

<h3>⭐ Reseñas de clientes</h3>

<?php if(empty($reviews)): ?>
    <p>No hay reseñas todavía</p>
<?php endif; ?>

<?php foreach($reviews as $r): ?>

<div class="card mb-3">
    <div class="card-body">

        <h5>⭐ <?= $r['rating'] ?> / 5</h5>

        <p><?= $r['comentario'] ?></p>

        <small>
            Usuario: <?= $r['usuario'] ?? 'Anónimo' ?>
        </small>

        <!-- FOTOS -->
        <?php if(!empty($r['fotos'])): ?>
            <div class="mt-2">
                <?php foreach($r['fotos'] as $f): ?>
                    <img src="<?= $f ?>" style="width:100px;height:100px;object-fit:cover;margin-right:5px;">
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <!-- VIDEO -->
        <?php if(!empty($r['video'])): ?>
            <div class="mt-2">
                <video width="250" controls>
                    <source src="<?= $r['video'] ?>" type="video/mp4">
                </video>
            </div>
        <?php endif; ?>

    </div>
</div>

<?php endforeach; ?>

</div>

<!-- FOOTER -->
<?php
require_once __DIR__ . '/partials/footer.php';?>