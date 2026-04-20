<?php
require_once __DIR__ . '/../partials/header.php';
?>
<!-- /Header del Admin -->


    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Productos</h2>


    </div>
<main class="container mt-4">

    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th hidden>ID</th>
                <th>Nombre</th>
                <th>Imagen</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Categoría</th>
                <th>Marca</th>
                <th width="120">Editar</th>
                <th width="120">Eliminar</th>
            </tr>
        </thead>

        <tbody>

        <?php if (!empty($productos)): ?>

            <?php foreach ($productos as $p): ?>
                <tr>
                    <td hidden><?= $p['id'] ?></td>

                    <td><?= htmlspecialchars($p['nombre'] ?? '') ?></td>
                    <td>
                        <?php if(!empty($p['imagenes'])): ?>
                        <?php foreach($p['imagenes'] as $img): ?>
                            <img src="<?= BASE_URL . $img['url'] ?>" width="40">
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </td>
                    <td><?= htmlspecialchars($p['descripcion'] ?? '') ?></td>
                    <td><?= $p['precio'] ?></td>
                    <td><?= $p['stock'] ?></td>
                    <td><?= htmlspecialchars($p['categoria'] ?? '') ?></td>
                    <td><?= htmlspecialchars($p['marca'] ?? '') ?></td>

                    <td>
                        <a href="index.php?controller=Product&action=edit&id=<?= $p['id'] ?>" 
                           class="btn btn-success btn-sm">
                            Editar
                        </a>
                    </td>

                    <td>
                        <form action="index.php?controller=Product&action=delete" method="POST" style="display:inline;" >
                            
                            <input type="hidden" name="id" value="<?= $p['id'] ?>">
                            <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('¿Eliminar este producto?')">
                                Eliminar
                            </button>
                        </form>
                    </td>

                </tr>
            <?php endforeach; ?>

        <?php else: ?>

            <tr>
                <td colspan="9" class="text-center text-muted">
                    No hay productos registrados
                </td>
            </tr>

        <?php endif; ?>

        </tbody>
    </table>

</main>
        <a href="index.php?controller=Product&action=create" class="btn btn-primary btn-sm">
            Crear Producto
        </a>

<!-- FOOTER -->
<?php
require_once __DIR__ . '/../partials/footer.php';