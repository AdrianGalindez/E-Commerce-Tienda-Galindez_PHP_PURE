<?php
require_once __DIR__ . '/partials/header.php';
require_once __DIR__ . '/partials/carousel.php';
?>

<h2>Login</h2>

<form method="POST" action="index.php?controller=Auth&action=login">
    <label>Email:</label><br>
    <input type="email" name="email" required><br>
    <label>Password:</label><br>
    <input type="password" name="password" required><br>
    <button type="submit">Ingresar</button>
</form>
<p><a href="index.php?controller=Auth&action=register">Registrarse</a></p>


<!-- FOOTER -->
<?php
require_once __DIR__ . '/partials/footer.php';?>