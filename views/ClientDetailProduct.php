<?php
define('BASE_URL', '/');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle Producto</title>
    <link rel="stylesheet" href="/assets/css/styles.css">
    <link rel="stylesheet" href="/assets/css/product.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<!-- HEADER -->
<header id="header">
<nav class="navbar navbar-expand-lg ">
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