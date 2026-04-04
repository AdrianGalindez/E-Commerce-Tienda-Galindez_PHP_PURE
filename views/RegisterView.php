<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
<h2>Registro de Usuario</h2>
<form method="POST" action="index.php?controller=Auth&action=register">
    <label>Nombre:</label><br>
    <input type="text" name="name" required><br>
    <label>Email:</label><br>
    <input type="email" name="email" required><br>
    <label>Password:</label><br>
    <input type="password" name="password" required><br>
    <button type="submit">Registrar</button>
</form>
<p><a href="index.php?controller=Auth&action=login">Login</a></p>


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