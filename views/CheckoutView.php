<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
</head>
<body>
<h2>Checkout</h2>
<form method="POST" action="index.php?controller=Cart&action=processOrder">
    <label>Nombre:</label><br>
    <input type="text" name="customer_name" required><br>
    <label>Dirección:</label><br>
    <input type="text" name="address" required><br>
    <label>Pago:</label><br>
    <select name="payment_method" required>
        <option value="cash">Efectivo</option>
        <option value="card">Tarjeta</option>
    </select><br>
    <button type="submit">Finalizar Compra</button>
</form>
<a href="index.php?controller=Cart&action=index">Volver al Carrito</a>
</body>
</html>