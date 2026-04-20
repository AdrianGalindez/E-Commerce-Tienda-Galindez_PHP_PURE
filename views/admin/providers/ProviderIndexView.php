<?php
require_once __DIR__ . '/../partials/header.php';
?>
<!-- /Header del Admin -->

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Proveedores</h2>


    </div>
<main class="container mt-4">


    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th hidden>ID</th>
                <th>Nombre</th>
                <th width="120">Editar</th>
                <th width="120">Eliminar</th>
            </tr>
        </thead>

        <tbody>

        <?php if (!empty($providers)): ?>

            <?php foreach ($providers as $p): ?>
                <tr>
                    <td hidden><?= $p['id'] ?></td>

                    <td><?= htmlspecialchars($p['nombre'] ?? '') ?></td>

                    <td>
                        <a href="index.php?controller=Provider&action=edit&id=<?= $p['id'] ?>" 
                           class="btn btn-success btn-sm">
                            Editar
                        </a>
                    </td>

                    <td>
                        <form action="index.php?controller=Provider&action=delete" method="POST" style="display:inline;">
                            <input type="hidden" name="id" value="<?= $p['id'] ?>">
                            <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('¿Eliminar este proveedor?')">
                                Eliminar
                            </button>
                        </form>
                    </td>

                </tr>
            <?php endforeach; ?>

        <?php else: ?>

            <tr>
                <td colspan="4" class="text-center text-muted">
                    No hay proveedores registrados
                </td>
            </tr>

        <?php endif; ?>

        </tbody>
    </table>

</main>
<a href="index.php?controller=Provider&action=create" class="btn btn-primary btn-sm">
    Crear Proveedor
</a>

<!-- FOOTER -->
<?php
require_once __DIR__ . '/../partials/footer.php';