<?php
require_once __DIR__ . '/../partials/header.php';
?>
<!-- /Header del Admin -->

<h2>Crear Producto</h2>
<form method="POST" action="index.php?controller=product&action=store" enctype="multipart/form-data">

    <label>Nombre:</label><br>
    <input type="text" name="nombre" required><br>

    <label>Descripción:</label><br>
    <input type="text" name="descripcion"><br>

    <label>Precio:</label><br>
    <input type="number" step="0.01" name="precio" required><br>

    <label>Stock:</label><br>
    <input type="number" name="stock"><br>

    <label>Categoría ID:</label><br>
    <select name="categoria_id">
      <?php foreach($categorias as $c): ?>
          <option value="<?= $c['id'] ?>">
              <?= $c['nombre'] ?>
          </option>
      <?php endforeach; ?>
    </select>

    <label>Marca:</label><br>
    
    <select name="marca_id" required>
        <option value="">Seleccione una marca</option>
    
        <?php foreach($marcas as $m): ?>
            <option value="<?= $m['id'] ?>">
                <?= $m['nombre'] ?>
            </option>
        <?php endforeach; ?>
    
    </select>
    <br>
     <label>Imágenes (máx 5):</label><br>
    <input type="file" name="imagenes[]" multiple accept="image/*"><br><br>

    <button type="submit">Guardar</button>
</form>

<!-- FOOTER -->
<?php
require_once __DIR__ . '/../partials/footer.php';