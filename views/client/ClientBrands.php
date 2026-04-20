<?php
require_once __DIR__ . '/partials/header.php';
require_once __DIR__ . '/partials/carousel.php';
?>

<h1 class="mb-3">Marcas</h1>
<!-- MAIN -->
<main class="container mt-4">

    
    <p class="mb-4">
        Tus marcas favoritas.
    </p>
<h1 class="mb-3">Marcas</h1>

<div class="row">

<?php foreach($brands as $brand): ?>

    <div class="col-md-3">
        <div class="card mb-4">

            <img 
                src="<?= !empty($brand['foto']) ? $brand['foto'] : '/assets/img/default.jpg' ?>" 
                class="card-img-top"
            >

            <div class="card-body">
                <h5><?= htmlspecialchars($brand['nombre']) ?></h5>
            </div>

            <div class="card-body">
                <a href="index.php?controller=brand&action=show&id=<?= $brand['id'] ?>">
                    Ver productos
                </a>
            </div>

        </div>
    </div>

<?php endforeach; ?>

</div>

</main>




<?php
require_once __DIR__ . '/partials/footer.php';?>