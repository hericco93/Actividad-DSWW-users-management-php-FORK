<?php

declare(strict_types=1);

require_once __DIR__ . '/../ValueObjects/ApplicationId.php';
require_once __DIR__ . '/../ValueObjects/ApplicationPrice.php';
require_once __DIR__ . '/../ValueObjects/ApplicationInstallerSize.php';
require_once __DIR__ . '/../ValueObjects/ApplicationWebUrl.php';
require_once __DIR__ . '/../ValueObjects/ApplicationContactEmail.php';
require_once __DIR__ . '/../Enums/ApplicationBitsEnum.php';
require_once __DIR__ . '/../Enums/ApplicationLicenseEnum.php';
require_once __DIR__ . '/../Exceptions/InvalidApplicationDataException.php';

final class ApplicationModel
{
    private ApplicationId $id;
    private string $nombre;
    private string $proveedor;
    private string $categoria;
    private string $lenguajePrincipal;
    private string $lenguajeSecundario;
    private bool $usaBd;
    private bool $requiereConexionRed;
    private ApplicationBitsEnum $numBits;
    private string $sistemaOperativo;
    private string $requisitosHardware;
    private ApplicationLicenseEnum $licencia;
    private ApplicationPrice $precio;
    private string $descripcion;
    private ApplicationWebUrl $web;
    private ApplicationContactEmail $correo;
    private ApplicationInstallerSize $tamanoInstalador;

    public function __construct(
        ApplicationId $id,
        string $nombre,
        string $proveedor,
        string $categoria,
        string $lenguajePrincipal,
        string $lenguajeSecundario,
        bool $usaBd,
        bool $requiereConexionRed,
        ApplicationBitsEnum $numBits,
        string $sistemaOperativo,
        string $requisitosHardware,
        ApplicationLicenseEnum $licencia,
        ApplicationPrice $precio,
        string $descripcion,
        ApplicationWebUrl $web,
        ApplicationContactEmail $correo,
        ApplicationInstallerSize $tamanoInstalador
    ) {
        $this->id = $id;
        $this->nombre = $this->assertRequiredText($nombre, 'nombre');
        $this->proveedor = $this->assertRequiredText($proveedor, 'proveedor');
        $this->categoria = $this->assertRequiredText($categoria, 'categoria');
        $this->lenguajePrincipal = $this->assertRequiredText($lenguajePrincipal, 'lenguajePrincipal');
        $this->lenguajeSecundario = trim($lenguajeSecundario);
        $this->usaBd = $usaBd;
        $this->requiereConexionRed = $requiereConexionRed;
        $this->numBits = $numBits;
        $this->sistemaOperativo = $this->assertRequiredText($sistemaOperativo, 'sistemaOperativo');
        $this->requisitosHardware = $this->assertRequiredText($requisitosHardware, 'requisitosHardware');
        $this->licencia = $licencia;
        $this->precio = $precio;
        $this->descripcion = $this->assertRequiredText($descripcion, 'descripcion');
        $this->web = $web;
        $this->correo = $correo;
        $this->tamanoInstalador = $tamanoInstalador;
    }

    private function assertRequiredText(string $value, string $fieldName): string
    {
        $normalized = trim($value);
        if ($normalized === '') {
            throw InvalidApplicationDataException::becauseFieldIsEmpty($fieldName);
        }
        return $normalized;
    }

    public function id(): ApplicationId { return $this->id; }
    public function nombre(): string { return $this->nombre; }
    public function proveedor(): string { return $this->proveedor; }
    public function categoria(): string { return $this->categoria; }
    public function lenguajePrincipal(): string { return $this->lenguajePrincipal; }
    public function lenguajeSecundario(): string { return $this->lenguajeSecundario; }
    public function usaBd(): bool { return $this->usaBd; }
    public function requiereConexionRed(): bool { return $this->requiereConexionRed; }
    public function numBits(): ApplicationBitsEnum { return $this->numBits; }
    public function sistemaOperativo(): string { return $this->sistemaOperativo; }
    public function requisitosHardware(): string { return $this->requisitosHardware; }
    public function licencia(): ApplicationLicenseEnum { return $this->licencia; }
    public function precio(): ApplicationPrice { return $this->precio; }
    public function descripcion(): string { return $this->descripcion; }
    public function web(): ApplicationWebUrl { return $this->web; }
    public function correo(): ApplicationContactEmail { return $this->correo; }
    public function tamanoInstalador(): ApplicationInstallerSize { return $this->tamanoInstalador; }
}
