<?php
require_once __DIR__ . '/../partials/header.php';
?>
<!-- /Header del Admin -->


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

        <?php if(!empty($categories)): ?>

            <?php foreach($categories as $c): ?>
                <tr>
                    <td hidden><?= $c['id'] ?></td>

                    <td><?= htmlspecialchars($c['nombre'] ?? '') ?></td>

                    <td>
                        <a href="index.php?controller=category&action=edit&id=<?= $c['id'] ?>" 
                           class="btn btn-success btn-sm">
                            Editar
                        </a>
                    </td>

                    <td>
                      <form action="index.php?controller=category&action=delete" method="POST" style="display:inline;">
                          <input type="hidden" name="id" value="<?= $c['id'] ?>">
                          <button class="btn btn-danger btn-sm"
                                  onclick="return confirm('¿Eliminar esta categoría?')">
                              Eliminar
                          </button>
                      </form>
                  </td>
                </tr>
                
            <?php endforeach; ?>
            
        <?php else: ?>

            <tr>
                <td colspan="4" class="text-center text-muted">
                    No hay categorías registradas
                </td>
            </tr>
 
        <?php endif; ?>
        </tbody>
    </table>
           

</main>
 <a href="index.php?controller=category&action=create" class="btn btn-primary">Crear Categoría</a>

<!-- FOOTER -->
<?php
require_once __DIR__ . '/../partials/footer.php';