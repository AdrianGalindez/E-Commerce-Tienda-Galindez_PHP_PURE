<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
<h2>Dashboard</h2>
<ul>
    <li><a href="index.php?controller=Product&action=index">Productos</a></li>
    <li><a href="index.php?controller=Category&action=index">Categorías</a></li>
    <li><a href="index.php?controller=Brand&action=index">Marcas</a></li>
    <li><a href="index.php?controller=Provider&action=index">Proveedores</a></li>
    <li><a href="index.php?controller=Cart&action=index">Carrito</a></li>
    <li><a href="index.php?controller=Sale&action=index">Ventas</a></li>
</ul>

<!-- ================================== -->
     <!-- Header / Navbar -->
    <header id="header">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="/"><i class="bi bi-house-door"></i> Tienda Galindez</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <!-- Dropdown Categorias -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-grid"></i> Categorías
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#"><i class="bi bi-grid"></i> Todas las Categorías</a></li>
                                
                                <!-- Iteración de categorías (EJS) -->
                                <% if (categorias && categorias.length > 0) { %>
                                    <% categorias.forEach(cat => { %>
                                        <li><a class="dropdown-item" href="/categoria/<%= encodeURIComponent(cat.nombre) %>"><i class="bi bi-tag"></i> <%= cat.nombre %></a></li>
                                    <% }) %>
                                <% } else { %>
                                    <li><a class="dropdown-item text-danger">No hay categorías</a></li>
                                <% } %>
                                
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="/otros"><i class="bi bi-box"></i> Otros</a></li>
                            </ul>
                        </li>

                        <!-- Enlaces principales -->
                        <li class="nav-item"><a class="nav-link" href="/promociones"><i class="bi bi-tag"></i> Promociones</a></li>
                        <li class="nav-item"><a class="nav-link" href="/marcas"><i class="bi bi-bookmark"></i> Marcas</a></li>
                        <li class="nav-item"><a class="nav-link" href="/carrito"><i class="bi bi-cart"></i> Carrito</a></li>
                        <li class="nav-item"><a class="nav-link" href="/perfil"><i class="bi bi-person"></i> Perfil</a></li>
                    </ul>

                    <!-- Buscador -->
                    <form class="d-flex" role="search" action="/buscar" method="GET">
                        <input class="form-control me-2" type="search" name="q" placeholder="Buscar productos..." aria-label="Buscar">
                        <button class="btn btn-outline-success" type="submit"><i class="bi bi-search"></i></button>
                    </form>
                </div>
            </div>
        </nav>
    </header>
    <!-- /Header -->
</body>
</html>