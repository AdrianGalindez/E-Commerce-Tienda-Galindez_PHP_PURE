<?php
// Variables esperadas desde el controlador:
// $categoria = ['nombre' => '...'];
// $productos = [...];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Categoría</title>
    <link rel="stylesheet" href="/assets/css/styles.css">
    <link rel="stylesheet" href="/assets/css/categories.css">
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
<footer class="text-center mt-5 p-3 bg-dark text-white">
    © 2026 Tienda Galindez
</footer>

</body>
</html>