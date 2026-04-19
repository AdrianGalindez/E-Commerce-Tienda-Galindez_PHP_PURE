<h2>Roles</h2>

<a href="index.php?controller=role&action=create">Crear Rol</a>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Acciones</th>
    </tr>

    <?php foreach($roles as $r): ?>
    <tr>
        <td><?= $r['id'] ?></td>
        <td><?= $r['nombre'] ?></td>
        <td>
            <a href="index.php?controller=role&action=edit&id=<?= $r['id'] ?>">Editar</a> |
            <a href="index.php?controller=role&action=delete&id=<?= $r['id'] ?>"
               onclick="return confirm('¿Eliminar rol?')">
                Eliminar
            </a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>