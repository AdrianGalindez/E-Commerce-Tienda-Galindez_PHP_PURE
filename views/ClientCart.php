<?php
define('BASE_URL', '/');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Carrito</title>
    <link rel="stylesheet" href="/assets/css/styles.css">
    <link rel="stylesheet" href="/assets/css/car.css">
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
            <form action="index.php?controller=checkout&action=process" method="POST">
                <button class="btn btn-success w-100 mt-3">
                    Proceder al Pago
                </button>
            </form>

        </div>

    </div>

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

</body>
</html>