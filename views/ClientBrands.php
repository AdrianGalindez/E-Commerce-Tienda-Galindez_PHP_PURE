<?php
define('BASE_URL', '/');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Marcas</title>
    <link rel="stylesheet" href="/assets/css/brands.css">
    <link rel="stylesheet" href="/assets/css/styles.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<!-- HEADER -->
<header id="header">
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?= BASE_URL ?>index.php"><i class="bi bi-house-door"></i> Tienda Galindez</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        <!-- CATEGORIAS -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-grid"></i> Categorías
          </a>
          <ul class="dropdown-menu">
            <li>
              <a class="dropdown-item" href="#"><i class="bi bi-grid"></i> Categorías</a>
            </li>

            <?php if(!empty($categorias)): ?>
                <?php foreach($categorias as $cat): ?>
                    <li>
                        <a class="dropdown-item" href="<?= BASE_URL ?>index.php?controller=product&action=index&categoria=<?= urlencode($cat['nombre']) ?>">
                            <i class="bi bi-tag"></i> <?= htmlspecialchars($cat['nombre']) ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            <?php else: ?>
                <li><a class="dropdown-item text-danger">No hay categorías</a></li>
            <?php endif; ?>

            <li><hr class="dropdown-divider"></li>
            <li>
              <a class="dropdown-item" href="<?= BASE_URL ?>index.php?controller=otros&action=index"><i class="bi bi-box"></i> Otros</a>
            </li>
          </ul>
        </li>

        <!-- PROMOCIONES -->
        <li class="nav-item">
            <a class="nav-link" href="<?= BASE_URL ?>index.php?controller=promotion&action=index"><i class="bi bi-tag"></i> Promociones</a>
        </li>

        <!-- MARCAS -->
        <li class="nav-item">
            <a class="nav-link" href="<?= BASE_URL ?>index.php?controller=brand&action=index"><i class="bi bi-bookmark"></i> Marcas</a>       
        </li>

        <!-- CARRITO -->
        <li class="nav-item">
            <a class="nav-link" href="<?= BASE_URL ?>index.php?controller=cart&action=index"><i class="bi bi-cart"></i> Carrito</a>
        </li>

      </ul>

      <!-- FORMULARIO DE BUSQUEDA -->
      <form class="d-flex" role="search" action="<?= BASE_URL ?>index.php?controller=search&action=index" method="get">
        <input class="form-control me-2" type="search" name="q" placeholder="Search" aria-label="Search"/>
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>

    </div>
  </div>
</nav>
</header>
<h1 class="mb-3">Marcas</h1>
<!-- MAIN -->
<main class="container mt-4">

    
    <p class="mb-4">
        Tus marcas favoritas.
    </p>

    <div class="row">

        <?php if(!empty($brands)): ?>
            <?php foreach($brands as $brand): ?>

                <div class="col-md-3">
                    <div class="card mb-4">

                        <!-- Imagen -->
                        <img 
                            src="<?= !empty($brand['foto']) ? $brand['foto'] : '/assets/img/default.jpg' ?>" 
                            class="card-img-top"
                        >

                        <div class="card-body">
                            <h5 class="card-title"><?= $brand['nombre'] ?></h5>
                            <p class="card-text">
                                Marca registrada en el sistema
                            </p>
                        </div>

                        <div class="card-body">
                            <a href="index.php?controller=brand&action=show&nombre=<?= urlencode($brand['nombre']) ?>" class="card-link">
                                Ver productos
                            </a>
                        </div>

                    </div>
                </div>

            <?php endforeach; ?>
        <?php else: ?>
            <p class="text-danger">No hay marcas disponibles</p>
        <?php endif; ?>

    </div>

</main>

<!-- FOOTER -->
<footer class="footer">
    <div class="footer-container">

        <!-- TIENDA -->
        <div class="footer-col">
            <h3>Tienda Galindez</h3>
            <p>La mejor tienda online con productos de calidad y envíos rápidos 🛵.</p>
        </div>

        <!-- ENLACES -->
        <div class="footer-col">
            <h4>Enlaces</h4>
            <a href="<?= BASE_URL ?>index.php?controller=category&action=index">Categorías</a>
            <a href="<?= BASE_URL ?>index.php?controller=promotion&action=index">Ofertas</a>
            <a href="<?= BASE_URL ?>index.php?controller=product&action=top_selling">Más vendidos</a>
            <a href="<?= BASE_URL ?>index.php?controller=contact&action=index">Contacto</a>
        </div>

        <!-- AYUDA -->
        <div class="footer-col">
            <h4>Ayuda</h4>
            <a href="<?= BASE_URL ?>index.php?controller=help&action=how_to_buy">Cómo comprar</a>
            <a href="<?= BASE_URL ?>index.php?controller=help&action=shipping">Envíos</a>
            <a href="<?= BASE_URL ?>index.php?controller=help&action=returns">Devoluciones</a>
            <a href="<?= BASE_URL ?>index.php?controller=help&action=support">Soporte</a>
        </div>

        <!-- REDES SOCIALES -->
        <div class="footer-col">
            <h4>Redes</h4>
            <div class="socials">
                <a href="https://facebook.com" target="_blank"><i class="fab fa-facebook"></i></a>
                <a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
                <a href="https://wa.me/123456789" target="_blank"><i class="fab fa-whatsapp"></i></a>
            </div>
        </div>

    </div>

    <!-- FOOTER BOTTOM -->
    <div class="footer-bottom">
        © 2026 Tienda Galindez - Todos los derechos reservados
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>