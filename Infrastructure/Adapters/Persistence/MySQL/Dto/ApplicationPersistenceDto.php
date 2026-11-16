<?php

declare(strict_types=1);

final class ApplicationPersistenceDto
{
    public function __construct(
        public string $id,
        public string $nombre,
        public string $proveedor,
        public string $categoria,
        public string $lenguajePrincipal,
        public string $lenguajeSecundario,
        public int $usaBd,
        public int $requiereConexionRed,
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
}
