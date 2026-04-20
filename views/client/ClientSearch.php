<?php
require_once __DIR__ . '/partials/header.php';
require_once __DIR__ . '/partials/carousel.php';
?>

<!-- carousel -->
<div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="/assets/img/farmacia.jpg" class="d-block w-100">
    </div>
    <div class="carousel-item">
      <img src="/assets/img/granos.jpg" class="d-block w-100">
    </div>
    <div class="carousel-item">
      <img src="/assets/img/papeleria.jpg" class="d-block w-100">
    </div>
  </div>

  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Anterior</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Siguiente</span>
  </button>
</div>

<!-- PRODUCTOS -->


<h2 class="mt-4 text-center">
    Resultados de búsqueda para: 
    "<?= htmlspecialchars($_GET['q'] ?? '') ?>"
</h2>

<?php if(empty($productos)): ?>
    <p class="text-center text-danger">No se encontraron productos</p>
<?php endif; ?>

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
<!-- FOOTER -->
<?php
require_once __DIR__ . '/partials/footer.php';?>