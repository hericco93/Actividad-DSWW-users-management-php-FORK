<?php require __DIR__ . '/../layouts/header.php'; ?>
<?php require __DIR__ . '/../layouts/menu.php'; ?>

<?php $old = is_array($old ?? null) ? $old : array(); ?>

<h1>Registrar nueva aplicación</h1>

<?php if (!empty($message)): ?>
    <div class="alert-error">
        <?= htmlspecialchars((string) $message, ENT_QUOTES, 'UTF-8') ?>
    </div>
<?php endif; ?>

<form action="?route=applications.store" method="POST">
    <div>
        <label for="nombre">Nombre de la aplicación *:</label><br>
        <input type="text" id="nombre" name="nombre" required value="<?= htmlspecialchars((string) ($old['nombre'] ?? ''), ENT_QUOTES, 'UTF-8') ?>">
    </div><br>

    <div>
        <label for="proveedor">Proveedor *:</label><br>
        <input type="text" id="proveedor" name="proveedor" required value="<?= htmlspecialchars((string) ($old['proveedor'] ?? ''), ENT_QUOTES, 'UTF-8') ?>">
    </div><br>

    <div>
        <label for="categoria">Categoría *:</label><br>
        <input type="text" id="categoria" name="categoria" required placeholder="Ej: Desarrollo, Ofimática, Seguridad" value="<?= htmlspecialchars((string) ($old['categoria'] ?? ''), ENT_QUOTES, 'UTF-8') ?>">
    </div><br>

    <div>
        <label for="lenguaje_principal">Lenguaje principal *:</label><br>
        <input type="text" id="lenguaje_principal" name="lenguaje_principal" required value="<?= htmlspecialchars((string) ($old['lenguaje_principal'] ?? ''), ENT_QUOTES, 'UTF-8') ?>">
    </div><br>

    <div>
        <label for="lenguaje_secundario">Lenguaje secundario (opcional):</label><br>
        <input type="text" id="lenguaje_secundario" name="lenguaje_secundario" value="<?= htmlspecialchars((string) ($old['lenguaje_secundario'] ?? ''), ENT_QUOTES, 'UTF-8') ?>">
    </div><br>

    <div>
        <label>
            <input type="checkbox" name="usa_bd" value="1" <?= !empty($old['usa_bd']) ? 'checked' : '' ?>>
            ¿Usa base de datos?
        </label>
    </div><br>

    <div>
        <label>
            <input type="checkbox" name="requiere_conexion_red" value="1" <?= !empty($old['requiere_conexion_red']) ? 'checked' : '' ?>>
            ¿Requiere conexión a red?
        </label>
    </div><br>

    <div>
        <label for="num_bits">Arquitectura (Bits) *:</label><br>
        <select id="num_bits" name="num_bits" required>
            <?php foreach ($bitsOptions as $bits): ?>
                <option value="<?= (int) $bits ?>" <?= ((string) ($old['num_bits'] ?? '64') === (string) $bits) ? 'selected' : '' ?>>
                    <?= (int) $bits ?> bits
                </option>
            <?php endforeach; ?>
        </select>
    </div><br>

    <div>
        <label for="sistema_operativo">Sistema operativo *:</label><br>
        <input type="text" id="sistema_operativo" name="sistema_operativo" required placeholder="Ej: Windows, Linux, macOS, Multiplataforma" value="<?= htmlspecialchars((string) ($old['sistema_operativo'] ?? ''), ENT_QUOTES, 'UTF-8') ?>">
    </div><br>

    <div>
        <label for="requisitos_hardware">Requisitos de hardware *:</label><br>
        <textarea id="requisitos_hardware" name="requisitos_hardware" rows="3" cols="50" required><?= htmlspecialchars((string) ($old['requisitos_hardware'] ?? ''), ENT_QUOTES, 'UTF-8') ?></textarea>
    </div><br>

    <div>
        <label for="licencia">Tipo de licencia *:</label><br>
        <select id="licencia" name="licencia" required>
            <?php foreach ($licenseOptions as $license): ?>
                <option value="<?= htmlspecialchars((string) $license, ENT_QUOTES, 'UTF-8') ?>" <?= (($old['licencia'] ?? '') === $license) ? 'selected' : '' ?>>
                    <?= htmlspecialchars((string) $license, ENT_QUOTES, 'UTF-8') ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div><br>

    <div>
        <label for="precio">Precio (USD) *:</label><br>
        <input type="number" step="0.01" min="0" id="precio" name="precio" required value="<?= htmlspecialchars((string) ($old['precio'] ?? '0.00'), ENT_QUOTES, 'UTF-8') ?>">
    </div><br>

    <div>
        <label for="descripcion">Descripción *:</label><br>
        <textarea id="descripcion" name="descripcion" rows="3" cols="50" required><?= htmlspecialchars((string) ($old['descripcion'] ?? ''), ENT_QUOTES, 'UTF-8') ?></textarea>
    </div><br>

    <div>
        <label for="web">Sitio web oficial *:</label><br>
        <input type="url" id="web" name="web" required placeholder="https://ejemplo.com" value="<?= htmlspecialchars((string) ($old['web'] ?? ''), ENT_QUOTES, 'UTF-8') ?>">
    </div><br>

    <div>
        <label for="correo">Correo de soporte/contacto *:</label><br>
        <input type="email" id="correo" name="correo" required placeholder="soporte@ejemplo.com" value="<?= htmlspecialchars((string) ($old['correo'] ?? ''), ENT_QUOTES, 'UTF-8') ?>">
    </div><br>

    <div>
        <label for="tamano_instalador">Tamaño del instalador (MB) *:</label><br>
        <input type="number" step="0.01" min="0.01" id="tamano_instalador" name="tamano_instalador" required value="<?= htmlspecialchars((string) ($old['tamano_instalador'] ?? ''), ENT_QUOTES, 'UTF-8') ?>">
    </div><br>

    <button type="submit">Guardar aplicación</button>
    <a href="?route=applications.index">Cancelar</a>
</form>

<?php require __DIR__ . '/../layouts/footer.php'; ?>
