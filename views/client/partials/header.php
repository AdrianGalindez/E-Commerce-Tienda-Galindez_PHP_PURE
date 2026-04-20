
<?php
define("BASE_URL", "http://localhost:8000/");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tienda Galindez</title>
    <link rel="stylesheet" href="/assets/css/styles.css">
    <link rel="stylesheet" href="/assets/css/cards.css">
    <link rel="stylesheet" href="/assets/css/carousel.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
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
            <a class="nav-link" href="<?= BASE_URL ?>index.php?controller=promotion&action=shop"><i class="bi bi-tag"></i> Promociones</a>
        </li>

        <!-- MARCAS -->
        <li class="nav-item">
            <a class="nav-link" href="index.php?controller=brand&action=shop"><i class="bi bi-bookmark"></i> Marcas</a>       
        </li>

        <!-- CARRITO -->
        <li class="nav-item">
            <a class="nav-link" href="<?= BASE_URL ?>index.php?controller=cart&action=index"><i class="bi bi-cart"></i> Carrito</a>
        </li>

      </ul>

      <!-- FORMULARIO DE BUSQUEDA -->
<form 
  class="d-flex" 
  role="search" 
  action="<?= BASE_URL ?>index.php" 
  method="get">

  <!-- CONTROLADOR Y ACCIÓN -->
  <input type="hidden" name="controller" value="search">
  <input type="hidden" name="action" value="index">

  <!-- INPUT BUSQUEDA -->
  <input 
    class="form-control me-2" 
    type="search" 
    name="q" 
    placeholder="Buscar productos..." 
    value="<?= htmlspecialchars($_GET['q'] ?? '') ?>" 
    aria-label="Search"
  />

  <button class="btn btn-outline-success" type="submit">
    Buscar
  </button>

</form>

    </div>
  </div>
</nav>
</header>