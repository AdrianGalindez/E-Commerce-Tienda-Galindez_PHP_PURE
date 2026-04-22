<?php
require_once __DIR__ . '/partials/header.php';
require_once __DIR__ . '/partials/carousel.php';
?>

<link rel="stylesheet" href="/assets/css/granos.css">
<div class="container mt-5">
    <div class="row g-4">

        <!-- 🔥 IMAGEN / CARRUSEL -->
        <div class="col-lg-6">

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



        <!-- 🧾 INFO PRODUCTO -->
        <div class="col-lg-6">

            <div class="product-detail-layout">

                <!-- INFO -->
                <div class="detail-info">

                    <h2><?= $product['nombre'] ?></h2>

                    <p class="text-muted mb-2">
                        Marca:
                        <strong><?= $product['marca'] ?? 'N/A' ?></strong>
                    </p>

                    <p class="mb-2">
                        Categoría:
                        <strong><?= $product['categoria'] ?? 'N/A' ?></strong>
                    </p>

                    <h3 class="text-success mb-3">
                        $ <?= $product['precio'] ?>
                    </h3>

                    <p>
                        <?= !empty($product['descripcion'])
                        ? $product['descripcion']
                        : 'Sin descripción disponible' ?>
                    </p>

                    <ul class="list-group mb-3">
                        <li class="list-group-item">
                            Stock disponible:
                            <strong><?= $product['stock'] ?></strong>
                        </li>
                    </ul>


                    <!-- FORM -->
                    <form action="index.php?controller=cart&action=add" method="POST">

                        <input type="hidden" name="product_id" value="<?= $product['id'] ?>">


                        <?php if(
                        isset($product['categoria']) &&
                        strtolower(trim($product['categoria'])) == 'granos'
                    ): ?>

                        <!-- INPUT GRANOS -->
                        <label class="form-label fw-bold">
                            Cantidad:
                        </label>

                        <div class="quantity-row mb-4">

                            <input type="number" name="cantidad" id="lbsInput" class="form-control quantity-input"
                                min="1" max="<?= $product['stock'] ?>" value="1">

                            <span class="stock-label">
                                Stock disponible:
                                <?= $product['stock'] ?>
                            </span>

                        </div>

                        <?php else: ?>

                        <!-- PRODUCTO NORMAL -->
                        <input type="hidden" name="cantidad" value="1">

                        <?php endif; ?>


                        <!-- BOTONES -->
                        <button class="btn btn-primary w-100 mb-2">
                            🛒 Agregar al carrito
                        </button>

                        <a href="index.php" class="btn btn-secondary w-100">
                            Volver
                        </a>

                    </form>

                </div>



                <!-- GRAFICO SOLO GRANOS -->
                <?php if(
                isset($product['categoria']) &&
                strtolower(trim($product['categoria'])) == 'granos'
            ): ?>

                <div class="detail-graph">

                    <div class="grain-ui compact-ui">

                        <!-- Palita -->
                        <div class="scoop">
                            <div class="scoop-bowl"></div>
                            <div class="scoop-handle"></div>
                        </div>

                        <!-- Zona caída -->
                        <div id="fallZone" class="fall-zone"></div>

                        <!-- Báscula -->
                        <div class="scale">

                            <div class="scale-plate">
                                <div id="grainPile" class="grain-pile"></div>
                            </div>

                            <div class="scale-base">

                                <div class="display-screen">
                                    <span id="weightText">0.0</span>
                                     -Libras
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <?php endif; ?>

            </div>

        </div>

    </div>
</div>

<hr class="container">
<!-- ⭐ RESEÑAS -->
<div class="container">
    <h3>⭐ Reseñas de clientes</h3>
</div>
<script src="assets/js/granos.js"></script>
<?php
require_once __DIR__ . '/partials/footer.php';
?>