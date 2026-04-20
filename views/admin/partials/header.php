<?php 
define("BASE_URL", "http://localhost:8000/E-Commerce-Tienda-Galindez_PHP_PURE/");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Crear Categoría</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/categories.css">
</head>
<body>

<!-- Header del Admin (mismo estilo que el header de usuario) -->
<header id="header">
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><i class="bi bi-house-door"></i> Admin Tienda Galindez</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        <!-- Dropdown de Gestión -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-gear"></i> Gestión
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="index.php?controller=product&action=indexAdmin"><i class="bi bi-box-seam"></i> Productos</a></li>
            <li><a class="dropdown-item" href="index.php?controller=category&action=index"><i class="bi bi-tags"></i> Categorías</a></li>
            <li><a class="dropdown-item" href="index.php?controller=brand&action=index"><i class="bi bi-bookmark-star"></i> Marcas</a></li>
            <li><a class="dropdown-item" href="index.php?controller=provider&action=index"><i class="bi bi-truck"></i> Proveedores</a></li>
            <li><a class="dropdown-item" href="index.php?controller=role&action=index"><i class="bi bi-person-badge"></i> Roles</a></li>
            <li><a class="dropdown-item" href="index.php?controller=user&action=index"><i class="bi bi-person-plus"></i> Usuarios</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="index.php?controller=sale&action=index"><i class="bi bi-cart-check"></i> Ventas</a></li>
          </ul>
        </li>

        <!-- Enlace a la tienda pública -->
        <li class="nav-item">
          <a class="nav-link" href="#" target="_blank"><i class="bi bi-house-door"></i> Mi Tienda</a>
        </li>

        <!-- Botón cerrar sesión -->
        <li class="nav-item">
          <a href="<?= BASE_URL ?>index.php?controller=auth&action=logout" class="btn btn-danger btn-sm d-flex align-items-center">
            <i class="bi bi-box-arrow-right me-1"></i> Cerrar sesión
          </a>
        </li>

      </ul>

      <!-- Formulario de búsqueda admin -->
      <form class="d-flex" role="search" action="<?= BASE_URL ?>index.php?controller=admin_search&action=index" method="GET">
        <input class="form-control me-2" type="search" placeholder="Buscar en admin..." aria-label="Search" name="q">
        <button class="btn btn-outline-success" type="submit"><i class="bi bi-search"></i></button>
      </form>

    </div>
  </div>
</nav>
</header>
<!-- /Header del Admin -->