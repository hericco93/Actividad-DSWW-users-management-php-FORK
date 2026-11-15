<?php

declare(strict_types=1);

final class UpdateApplicationCommand
{
    public function __construct(
        private string $id,
        private string $nombre,
        private string $proveedor,
        private string $categoria,
        private string $lenguajePrincipal,
        private string $lenguajeSecundario,
        private bool $usaBd,
        private bool $requiereConexionRed,
        private int $numBits,
        private string $sistemaOperativo,
        private string $requisitosHardware,
        private string $licencia,
        private float $precio,
        private string $descripcion,
        private string $web,
        private string $correo,
        private float $tamanoInstalador
    ) {
    }

    public function id(): string { return $this->id; }
    public function nombre(): string { return $this->nombre; }
    public function proveedor(): string { return $this->proveedor; }
    public function categoria(): string { return $this->categoria; }
    public function lenguajePrincipal(): string { return $this->lenguajePrincipal; }
    public function lenguajeSecundario(): string { return $this->lenguajeSecundario; }
    public function usaBd(): bool { return $this->usaBd; }
    public function requiereConexionRed(): bool { return $this->requiereConexionRed; }
    public function numBits(): int { return $this->numBits; }
    public function sistemaOperativo(): string { return $this->sistemaOperativo; }
    public function requisitosHardware(): string { return $this->requisitosHardware; }
    public function licencia(): string { return $this->licencia; }
    public function precio(): float { return $this->precio; }
    public function descripcion(): string { return $this->descripcion; }
    public function web(): string { return $this->web; }
    public function correo(): string { return $this->correo; }
    public function tamanoInstalador(): float { return $this->tamanoInstalador; }
}