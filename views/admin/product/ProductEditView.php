<?php
require_once __DIR__ . '/../partials/header.php';
?>
<!-- /Header del Admin -->

<h2>Editar Producto</h2>

<form method="POST" action="index.php?controller=product&action=update" enctype="multipart/form-data">

    <input type="hidden" name="id" value="<?= $product['id'] ?>">

    <label>Nombre:</label><br>
    <input type="text" name="nombre" value="<?= $product['nombre'] ?>" required><br><br>

    <label>Descripción:</label><br>
    <textarea name="descripcion"><?= $product['descripcion'] ?></textarea><br><br>

    <label>Precio:</label><br>
    <input type="number" step="0.01" name="precio" value="<?= $product['precio'] ?>" required><br><br>

    <label>Stock:</label><br>
    <input type="number" name="stock" value="<?= $product['stock'] ?>" required><br><br>

    <!-- 🔥 IMÁGENES ACTUALES -->
    <label>Imágenes actuales:</label><br>

    <?php if(!empty($product['fotos'])): ?>
        <?php foreach($product['fotos'] as $img): ?>
            <div style="display:inline-block; margin:10px;">
                <img src="<?= BASE_URL . $img ?>" width="80"><br>

                <!-- checkbox eliminar -->
                <input type="checkbox" name="delete_images[]" value="<?= $img ?>">
                Eliminar
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

    <br><br>

    <!-- 🔥 NUEVAS IMÁGENES -->
    <label>Agregar nuevas imágenes:</label><br>
    <input type="file" name="imagenes[]" multiple accept="image/*"><br><br>

    <button type="submit">Actualizar</button>
</form>


<!-- FOOTER -->
<?php
require_once __DIR__ . '/../partials/footer.php';