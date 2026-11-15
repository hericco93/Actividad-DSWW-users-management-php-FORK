<?php

declare(strict_types=1);

final class UpdateApplicationWebRequest
{
    public function __construct(
        public string $id,
        public string $nombre,
        public string $proveedor,
        public string $categoria,
        public string $lenguajePrincipal,
        public string $lenguajeSecundario,
        public bool $usaBd,
        public bool $requiereConexionRed,
        public int $numBits,
        public string $sistemaOperativo,
        public string $requisitosHardware,
        public string $licencia,
        public float $precio,
        public string $descripcion,
        public string $web,
        public string $correo,
        public float $tamanoInstalador
    ) {
    }

    /**
     * @param array<string, mixed> $post
     */
    public static function fromArray(array $post): self
    {
        return new self(
            trim((string) ($post['id'] ?? '')),
            trim((string) ($post['nombre'] ?? '')),
            trim((string) ($post['proveedor'] ?? '')),
            trim((string) ($post['categoria'] ?? '')),
            trim((string) ($post['lenguaje_principal'] ?? '')),
            trim((string) ($post['lenguaje_secundario'] ?? '')),
            isset($post['usa_bd']) && (string) $post['usa_bd'] === '1',
            isset($post['requiere_conexion_red']) && (string) $post['requiere_conexion_red'] === '1',
            (int) ($post['num_bits'] ?? 64),
            trim((string) ($post['sistema_operativo'] ?? '')),
            trim((string) ($post['requisitos_hardware'] ?? '')),
            trim((string) ($post['licencia'] ?? '')),
            (float) ($post['precio'] ?? 0.0),
            trim((string) ($post['descripcion'] ?? '')),
            trim((string) ($post['web'] ?? '')),
            trim((string) ($post['correo'] ?? '')),
            (float) ($post['tamano_instalador'] ?? 0.0)
        );
    }
}