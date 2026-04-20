<?php
require_once __DIR__ . '/../partials/header.php';
?>
<!-- /Header del Admin -->

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Listado de Usuarios</h2>


    </div>
<main class="container mt-4">

    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th hidden>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th width="120">Editar</th>
                <th width="120">Eliminar</th>
            </tr>
        </thead>

        <tbody>

        <?php if (!empty($users)): ?>

            <?php foreach ($users as $user): ?>
                <tr>
                    <td hidden><?= $user['id'] ?></td>

                    <td><?= htmlspecialchars($user['nombre'] ?? '') ?></td>
                    <td><?= htmlspecialchars($user['email'] ?? '') ?></td>
                    <td><?= htmlspecialchars($user['telefono'] ?? '') ?></td>

                    <td>
                        <a href="index.php?controller=user&action=edit&id=<?= $user['id'] ?>" 
                           class="btn btn-success btn-sm">
                            Editar
                        </a>
                    </td>

                    <td>
                        <form action="index.php?controller=user&action=delete" method="POST" style="display:inline;">
                            <input type="hidden" name="id" value="<?= $user['id'] ?>">
                            <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('¿Eliminar este usuario?')">
                                Eliminar
                            </button>
                        </form>
                    </td>

                </tr>
            <?php endforeach; ?>

        <?php else: ?>

            <tr>
                <td colspan="6" class="text-center text-muted">
                    No hay usuarios registrados
                </td>
            </tr>

        <?php endif; ?>

        </tbody>
    </table>

</main>
<a href="index.php?controller=user&action=create" class="btn btn-primary btn-sm">
    Agregar Usuario
</a>

<!-- FOOTER -->
<?php
require_once __DIR__ . '/../partials/footer.php';