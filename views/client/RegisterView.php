<?php
require_once __DIR__ . '/partials/header.php';
require_once __DIR__ . '/partials/carousel.php';
?>

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
<?php
require_once __DIR__ . '/partials/footer.php';?>