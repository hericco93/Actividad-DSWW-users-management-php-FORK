<?php

declare(strict_types=1);

final class ApplicationEntity
{
    public string $id;
    public string $nombre;
    public string $proveedor;
    public string $categoria;
    public string $lenguaje_principal;
    public string $lenguaje_secundario;
    public int $usa_bd;
    public int $requiere_conexion_red;
    public int $num_bits;
    public string $sistema_operativo;
    public string $requisitos_hardware;
    public string $licencia;
    public float $precio;
    public string $descripcion;
    public string $web;
    public string $correo;
    public float $tamano_instalador;

    /**
     * @param array<string, mixed> $row
     */
    public static function fromRow(array $row): self
    {
        $entity = new self();
        $entity->id = (string) $row['id'];
        $entity->nombre = (string) $row['nombre'];
        $entity->proveedor = (string) $row['proveedor'];
        $entity->categoria = (string) $row['categoria'];
        $entity->lenguaje_principal = (string) $row['lenguaje_principal'];
        $entity->lenguaje_secundario = (string) ($row['lenguaje_secundario'] ?? '');
        $entity->usa_bd = (int) $row['usa_bd'];
        $entity->requiere_conexion_red = (int) $row['requiere_conexion_red'];
        $entity->num_bits = (int) $row['num_bits'];
        $entity->sistema_operativo = (string) $row['sistema_operativo'];
        $entity->requisitos_hardware = (string) $row['requisitos_hardware'];
        $entity->licencia = (string) $row['licencia'];
        $entity->precio = (float) $row['precio'];
        $entity->descripcion = (string) $row['descripcion'];
        $entity->web = (string) $row['web'];
        $entity->correo = (string) $row['correo'];
        $entity->tamano_instalador = (float) $row['tamano_instalador'];

        return $entity;
    }
}