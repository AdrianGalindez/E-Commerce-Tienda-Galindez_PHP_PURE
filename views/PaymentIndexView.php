<?php
define('BASE_URL', '/');
?>
<!DOCTYPE html>
<html>
<head>
<title>Checkout</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="/assets/css/paymentPoint.css">
</head>
<body>

<?php if(empty($cartItems)): ?>

<p>Tu carrito está vacío.</p>

<?php else: ?>

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



<?php
$user = $user ?? [];
$cartItems = $cartItems ?? [];
$total = $total ?? 0;
?>

<div class="checkout-wrapper">
    <div class="checkout-header">
        <h1><i class="fas fa-store"></i> Punto de Pago Seguro</h1>
        <div class="badge-secure">
            <i class="fas fa-lock"></i> Transacción 100% encriptada · Pago protegido
        </div>
    </div>

    <div class="checkout-grid">

        <!-- COLUMNA IZQUIERDA -->
        <div class="form-card">
            <div class="section-title">
                <i class="fas fa-user-pen"></i>
                <span>Información de facturación</span>
            </div>

            <div class="input-group">
                <label>Nombre completo</label>
                <input type="text" name="fullName"
                    value="<?= htmlspecialchars($user['nombre'] ?? '') ?>"
                    placeholder="Ana Martínez">
            </div>

            <div class="input-row">
                <div class="input-group">
                    <label>Correo electrónico</label>
                    <input type="email" name="email"
                        value="<?= htmlspecialchars($user['email'] ?? '') ?>"
                        placeholder="cliente@ejemplo.com">
                </div>

                <div class="input-group">
                    <label>Teléfono</label>
                    <input type="tel" name="phone"
                        value="<?= htmlspecialchars($user['telefono'] ?? '') ?>"
                        placeholder="+57 310 000 0000">
                </div>
            </div>

            <div class="input-group">
                <label>Dirección</label>
                <input type="text" name="address"
                    value="<?= htmlspecialchars($user['direccion'] ?? '') ?>"
                    placeholder="Calle Principal 123">
            </div>

            <div class="input-row">
                <div class="input-group">
                    <label>Ciudad</label>
                    <input type="text" name="city"
                        value="<?= htmlspecialchars($user['ciudad'] ?? '') ?>"
                        placeholder="Ciudad">
                </div>

                <div class="input-group">
                    <label>Código postal</label>
                    <input type="text" name="zip"
                        value="<?= htmlspecialchars($user['zip'] ?? '') ?>"
                        placeholder="28001">
                </div>
            </div>

            <div class="payment-methods">
                <div class="section-title" style="margin-bottom: 1rem;">
                    <i class="fas fa-credit-card"></i>
                    <span>Método de pago</span>
                </div>

                <div class="methods-group">

                    <div class="method-option">
                        <input type="radio" name="metodo" value="tarjeta" checked>
                        <label>Tarjeta</label>
                    </div>

                    <div class="method-option">
                        <input type="radio" name="metodo" value="paypal">
                        <label>PayPal</label>
                    </div>

                    <div class="method-option">
                        <input type="radio" name="metodo" value="googlepay">
                        <label>Google Pay</label>
                    </div>

                </div>
            </div>
        </div>

        <!-- COLUMNA DERECHA -->
        <div class="summary-card">

            <div class="section-title">
                <span>Tu pedido</span>
            </div>

            <div class="order-items-list">

            <?php foreach($cartItems as $item): ?>

                <div class="order-item">

                    <div class="item-details">

                        <div class="item-title">
                            <?= htmlspecialchars($item["nombre"]) ?>
                        </div>

                        <div class="item-price">
                            <?= $item["precio"] ?> $
                        </div>

                        <div class="item-quantity">
                            Cantidad: <?= $item["cantidad"] ?>
                        </div>

                    </div>

                    <div class="item-line-price">
                        <?= $item["precio"] * $item["cantidad"] ?> $
                    </div>

                </div>

            <?php endforeach; ?>

            </div>

            <div class="divider"></div>

            <div class="summary-line">
               <span>Subtotal</span>
               <span><?= $total ?> $</span>
            </div>

            <div class="summary-line">
                <span>Envío</span>
                <span>$4.99</span>
            </div>

            <div class="summary-line">
                <span>Impuestos</span>
                <span>$12.00</span>
            </div>

            <div class="summary-line total">
                <span>Total</span>
                <span><?= $total + 4.99 + 12 ?> $</span>
            </div>

            <form action="index.php?controller=payment&action=store" method="POST">

                <input type="hidden" name="user_id" value="<?= $_SESSION["user_id"] ?>">

                <button class="pay-btn">
                    Confirmar pago · <?= $total ?> $
                </button>

            </form>

        </div>
    </div>
</div>

<?php endif; ?>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>