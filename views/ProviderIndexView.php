<!DOCTYPE html>
<html>
<head>
    <title>Listado de Proveedores</title>
</head>
<body>

<!-- Header del Admin (mismo estilo que el header de usuario) -->
<header id="header">
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?= BASE_URL ?>index.php"><i class="bi bi-house-door"></i> Admin Tienda Galindez</a>

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
            <li><a class="dropdown-item" href="<?= BASE_URL ?>index.php?controller=product&action=index"><i class="bi bi-box-seam"></i> Productos</a></li>
            <li><a class="dropdown-item" href="<?= BASE_URL ?>index.php?controller=category&action=index"><i class="bi bi-tags"></i> Categorías</a></li>
            <li><a class="dropdown-item" href="<?= BASE_URL ?>index.php?controller=brand&action=index"><i class="bi bi-bookmark-star"></i> Marcas</a></li>
            <li><a class="dropdown-item" href="<?= BASE_URL ?>index.php?controller=provider&action=index"><i class="bi bi-truck"></i> Proveedores</a></li>
            <li><a class="dropdown-item" href="<?= BASE_URL ?>index.php?controller=role&action=index"><i class="bi bi-person-badge"></i> Roles</a></li>
            <li><a class="dropdown-item" href="<?= BASE_URL ?>index.php?controller=user&action=index"><i class="bi bi-person-plus"></i> Usuarios</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="<?= BASE_URL ?>index.php?controller=sale&action=index"><i class="bi bi-cart-check"></i> Ventas</a></li>
          </ul>
        </li>

        <!-- Enlace a la tienda pública -->
        <li class="nav-item">
          <a class="nav-link" href="<?= BASE_URL ?>" target="_blank"><i class="bi bi-house-door"></i> Mi Tienda</a>
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

<h2>Proveedores</h2>
<a href="index.php?controller=Provider&action=create">Crear Proveedor</a>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Acciones</th>
    </tr>
<?php foreach($providers as $p): ?>
<tr>
    <td><?= $p['id'] ?></td>
    <td><?= $p['nombre'] ?></td>
    <td>
        <a href="index.php?controller=Provider&action=edit&id=<?= $p['id'] ?>">Editar</a> |
        <a href="index.php?controller=Provider&action=delete&id=<?= $p['id'] ?>">Eliminar</a>
    </td>
</tr>
<?php endforeach; ?>
</table>
<a href="index.php?controller=provider&action=index">Volver</a></body>

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

</html>