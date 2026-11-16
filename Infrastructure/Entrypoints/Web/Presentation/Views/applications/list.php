<?php require __DIR__ . '/../layouts/header.php'; ?>
<?php require __DIR__ . '/../layouts/menu.php'; ?>

<h1>Listado de aplicaciones</h1>

<?php if (!empty($message)): ?>
    <div class="alert-error">
        <?= htmlspecialchars((string) $message, ENT_QUOTES, 'UTF-8') ?>
    </div>
<?php endif; ?>

<?php if (!empty($success)): ?>
    <div class="alert-success">
        <?= htmlspecialchars((string) $success, ENT_QUOTES, 'UTF-8') ?>
    </div>
<?php endif; ?>

<p>
    <a href="?route=applications.create">+ Registrar nueva aplicación</a>
</p>

<?php if (empty($applications)): ?>
    <p>No hay aplicaciones registradas actualmente.</p>
<?php else: ?>
    <table border="1" cellpadding="8" cellspacing="0" style="width: 100%; border-collapse: collapse;">
        <thead>
        <tr>
            <th>Nombre</th>
            <th>Proveedor</th>
            <th>Categoría</th>
            <th>Lenguaje Principal</th>
            <th>Arquitectura</th>
            <th>Licencia</th>
            <th>Precio (USD)</th>
            <th>Tamaño (MB)</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($applications as $app): ?>
            <tr>
                <td><?= htmlspecialchars($app->nombre, ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($app->proveedor, ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($app->categoria, ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($app->lenguajePrincipal, ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars((string) $app->numBits, ENT_QUOTES, 'UTF-8') ?> bits</td>
                <td><?= htmlspecialchars($app->licencia, ENT_QUOTES, 'UTF-8') ?></td>
                <td>$<?= number_format($app->precio, 2) ?></td>
                <td><?= number_format($app->tamanoInstalador, 2) ?> MB</td>
                <td>
                    <a href="?route=applications.show&id=<?= urlencode($app->id) ?>">Ver</a> |
                    <a href="?route=applications.edit&id=<?= urlencode($app->id) ?>">Editar</a> |
                    <form action="?route=applications.delete" method="POST" style="display:inline;" onsubmit="return confirm('¿Seguro que deseas eliminar esta aplicación?');">
                        <input type="hidden" name="id" value="<?= htmlspecialchars($app->id, ENT_QUOTES, 'UTF-8') ?>">
                        <button type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>

<?php require __DIR__ . '/../layouts/footer.php'; ?>
