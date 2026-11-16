<?php require __DIR__ . '/../layouts/header.php'; ?>
<?php require __DIR__ . '/../layouts/menu.php'; ?>

    <h1>Detalle de la aplicación</h1>

<?php if (!empty($message)): ?>
    <div class="alert-error">
        <?= htmlspecialchars((string) $message, ENT_QUOTES, 'UTF-8') ?>
    </div>
<?php endif; ?>

    <table border="1" cellpadding="8" cellspacing="0" style="border-collapse: collapse; min-width: 500px;">
        <tr><th>ID</th><td><?= htmlspecialchars($application->id, ENT_QUOTES, 'UTF-8') ?></td></tr>
        <tr><th>Nombre</th><td><?= htmlspecialchars($application->nombre, ENT_QUOTES, 'UTF-8') ?></td></tr>
        <tr><th>Proveedor</th><td><?= htmlspecialchars($application->proveedor, ENT_QUOTES, 'UTF-8') ?></td></tr>
        <tr><th>Categoría</th><td><?= htmlspecialchars($application->categoria, ENT_QUOTES, 'UTF-8') ?></td></tr>
        <tr><th>Lenguaje principal</th><td><?= htmlspecialchars($application->lenguajePrincipal, ENT_QUOTES, 'UTF-8') ?></td></tr>
        <tr><th>Lenguaje secundario</th><td><?= htmlspecialchars($application->lenguajeSecundario !== '' ? $application->lenguajeSecundario : 'N/A', ENT_QUOTES, 'UTF-8') ?></td></tr>
        <tr><th>¿Usa base de datos?</th><td><?= $application->usaBd ? 'Sí' : 'No' ?></td></tr>
        <tr><th>¿Requiere conexión a red?</th><td><?= $application->requiereConexionRed ? 'Sí' : 'No' ?></td></tr>
        <tr><th>Arquitectura</th><td><?= (int) $application->numBits ?> bits</td></tr>
        <tr><th>Sistema operativo</th><td><?= htmlspecialchars($application->sistemaOperativo, ENT_QUOTES, 'UTF-8') ?></td></tr>
        <tr><th>Requisitos de hardware</th><td><?= nl2br(htmlspecialchars($application->requisitosHardware, ENT_QUOTES, 'UTF-8')) ?></td></tr>
        <tr><th>Licencia</th><td><?= htmlspecialchars($application->licencia, ENT_QUOTES, 'UTF-8') ?></td></tr>
        <tr><th>Precio</th><td>$<?= number_format($application->precio, 2) ?> USD</td></tr>
        <tr><th>Descripción</th><td><?= nl2br(htmlspecialchars($application->descripcion, ENT_QUOTES, 'UTF-8')) ?></td></tr>
        <tr><th>Sitio web</th><td><a href="<?= htmlspecialchars($application->web, ENT_QUOTES, 'UTF-8') ?>" target="_blank" rel="noopener noreferrer"><?= htmlspecialchars($application->web, ENT_QUOTES, 'UTF-8') ?></a></td></tr>
        <tr><th>Correo de soporte</th><td><?= htmlspecialchars($application->correo, ENT_QUOTES, 'UTF-8') ?></td></tr>
        <tr><th>Tamaño del instalador</th><td><?= number_format($application->tamanoInstalador, 2) ?> MB</td></tr>
    </table>

    <p style="margin-top: 15px;">
        <a href="?route=applications.edit&id=<?= urlencode($application->id) ?>">Editar</a> |
        <a href="?route=applications.index">Volver al listado</a>
    </p>

<?php require __DIR__ . '/../layouts/footer.php'; ?>