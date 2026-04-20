<?php
require_once __DIR__ . '/partials/header.php';
require_once __DIR__ . '/partials/carousel.php';
?>

<!-- MAIN -->
<main class="container mt-4">

    <h1>
        Categoría: <?= $categoria['nombre'] ?>
    </h1>

    <div class="row mt-4">

        <?php if(!empty($productos)): ?>
            <?php foreach($productos as $p): ?>

            <div class="col-md-3">
                <div class="card mb-4">

                    <!-- Imagen -->
                    <img 
                        src="<?= !empty($p['imagen']) ? $p['imagen'] : '/assets/img/default.jpg' ?>" 
                        class="card-img-top"
                    >

                    <div class="card-body">
                        <h5 class="card-title"><?= $p['nombre'] ?></h5>
                        <p class="card-text"><?= $p['descripcion'] ?></p>
                    </div>

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">$ <?= $p['precio'] ?></li>
                        <li class="list-group-item">Disponible</li>
                        <li class="list-group-item">
                            Stock: <?= $p['stock'] ?>
                        </li>
                    </ul>

                    <div class="card-body">
                        <a href="index.php?controller=product&action=show&id=<?= $p['id'] ?>" class="card-link">
                            Ver Detalles
                        </a>

                        <form action="index.php?controller=cart&action=add" method="POST" style="display:inline;">
                            <input type="hidden" name="producto_id" value="<?= $p['id'] ?>">
                            <button class="btn btn-sm btn-primary">🛒 Agregar</button>
                        </form>
                    </div>

                </div>
            </div>

            <?php endforeach; ?>
        <?php else: ?>
            <p class="text-danger">No hay productos en esta categoría</p>
        <?php endif; ?>

    </div>

</main>

<!-- FOOTER -->
<?php
require_once __DIR__ . '/partials/footer.php';?>