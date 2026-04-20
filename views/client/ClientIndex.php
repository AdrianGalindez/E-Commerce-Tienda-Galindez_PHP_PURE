<?php
require_once __DIR__ . '/partials/header.php';
require_once __DIR__ . '/partials/carousel.php';
?>


<!-- PRODUCTOS -->
<div class="container-cards">

<?php foreach($productos as $p): ?>

    <?php
    $img = (!empty($p['imagenes']) && isset($p['imagenes'][0]['url']))
        ? BASE_URL . $p['imagenes'][0]['url']
        : BASE_URL . 'assets/img/default.jpg';
    ?>

    <div class="card" style="width: 18rem;">

        <img 
            src="<?= $img ?>" 
            class="card-img-top" 
            alt="producto">

        <div class="card-body">
            <h5 class="card-title"><?= htmlspecialchars($p['nombre']) ?></h5>
            <p class="card-text"><?= htmlspecialchars($p['descripcion']) ?></p>
        </div>

        <ul class="list-group list-group-flush">
            <li class="list-group-item">$ <?= htmlspecialchars($p['precio']) ?></li>
            <li class="list-group-item">Disponible</li>
            <li class="list-group-item">
                Cantidad en Stock: <?= htmlspecialchars($p['stock']) ?>
            </li>
        </ul>

        <div class="card-body">
            <a 
                href="index.php?controller=product&action=show&id=<?= $p['id'] ?>" 
                class="card-link">
                Ver Detalles
            </a>

            <form 
                action="index.php?controller=cart&action=add" 
                method="POST" 
                style="display:inline;">
                
                <input 
                    type="hidden" 
                    name="product_id" 
                    value="<?= $p['id'] ?>">

                <button type="submit" class="card-link">
                    🛒 Agregar
                </button>
            </form>                        
        </div>

    </div>

<?php endforeach; ?>

</div>
<?php
require_once __DIR__ . '/partials/footer.php';?>