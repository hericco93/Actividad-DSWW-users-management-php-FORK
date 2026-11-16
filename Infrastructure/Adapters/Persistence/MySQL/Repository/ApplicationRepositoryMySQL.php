<?php

declare(strict_types=1);

require_once __DIR__ . '/../../../Application/Ports/Out/SaveApplicationPort.php';
require_once __DIR__ . '/../../../Application/Ports/Out/UpdateApplicationPort.php';
require_once __DIR__ . '/../../../Application/Ports/Out/DeleteApplicationPort.php';
require_once __DIR__ . '/../../../Application/Ports/Out/GetApplicationByIdPort.php';
require_once __DIR__ . '/../../../Application/Ports/Out/GetAllApplicationsPort.php';
require_once __DIR__ . '/../Entities/ApplicationEntity.php';
require_once __DIR__ . '/../Mappers/ApplicationPersistenceMapper.php';

final class ApplicationRepositoryMySQL implements
    SaveApplicationPort,
    UpdateApplicationPort,
    DeleteApplicationPort,
    GetApplicationByIdPort,
    GetAllApplicationsPort
{
    public function __construct(
        private PDO $connection
    ) {
    }

    public function save(ApplicationModel $application): ApplicationModel
    {
        $entity = ApplicationPersistenceMapper::toEntity($application);

        $sql = 'INSERT INTO aplicaciones (
                    id, nombre, proveedor, categoria, lenguaje_principal, lenguaje_secundario,
                    usa_bd, requiere_conexion_red, num_bits, sistema_operativo, requisitos_hardware,
                    licencia, precio, descripcion, web, correo, tamano_instalador
                ) VALUES (
                    :id, :nombre, :proveedor, :categoria, :lenguaje_principal, :lenguaje_secundario,
                    :usa_bd, :requiere_conexion_red, :num_bits, :sistema_operativo, :requisitos_hardware,
                    :licencia, :precio, :descripcion, :web, :correo, :tamano_instalador
                )';

        $stmt = $this->connection->prepare($sql);
        $stmt->execute([
            ':id' => $entity->id,
            ':nombre' => $entity->nombre,
            ':proveedor' => $entity->proveedor,
            ':categoria' => $entity->categoria,
            ':lenguaje_principal' => $entity->lenguaje_principal,
            ':lenguaje_secundario' => $entity->lenguaje_secundario !== '' ? $entity->lenguaje_secundario : null,
            ':usa_bd' => $entity->usa_bd,
            ':requiere_conexion_red' => $entity->requiere_conexion_red,
            ':num_bits' => $entity->num_bits,
            ':sistema_operativo' => $entity->sistema_operativo,
            ':requisitos_hardware' => $entity->requisitos_hardware,
            ':licencia' => $entity->licencia,
            ':precio' => $entity->precio,
            ':descripcion' => $entity->descripcion,
            ':web' => $entity->web,
            ':correo' => $entity->correo,
            ':tamano_instalador' => $entity->tamano_instalador,
        ]);

        return $application;
    }

    public function update(ApplicationModel $application): ApplicationModel
    {
        $entity = ApplicationPersistenceMapper::toEntity($application);

        $sql = 'UPDATE aplicaciones SET
                    nombre = :nombre,
                    proveedor = :proveedor,
                    categoria = :categoria,
                    lenguaje_principal = :lenguaje_principal,
                    lenguaje_secundario = :lenguaje_secundario,
                    usa_bd = :usa_bd,
                    requiere_conexion_red = :requiere_conexion_red,
                    num_bits = :num_bits,
                    sistema_operativo = :sistema_operativo,
                    requisitos_hardware = :requisitos_hardware,
                    licencia = :licencia,
                    precio = :precio,
                    descripcion = :descripcion,
                    web = :web,
                    correo = :correo,
                    tamano_instalador = :tamano_instalador
                WHERE id = :id';

        $stmt = $this->connection->prepare($sql);
        $stmt->execute([
            ':id' => $entity->id,
            ':nombre' => $entity->nombre,
            ':proveedor' => $entity->proveedor,
            ':categoria' => $entity->categoria,
            ':lenguaje_principal' => $entity->lenguaje_principal,
            ':lenguaje_secundario' => $entity->lenguaje_secundario !== '' ? $entity->lenguaje_secundario : null,
            ':usa_bd' => $entity->usa_bd,
            ':requiere_conexion_red' => $entity->requiere_conexion_red,
            ':num_bits' => $entity->num_bits,
            ':sistema_operativo' => $entity->sistema_operativo,
            ':requisitos_hardware' => $entity->requisitos_hardware,
            ':licencia' => $entity->licencia,
            ':precio' => $entity->precio,
            ':descripcion' => $entity->descripcion,
            ':web' => $entity->web,
            ':correo' => $entity->correo,
            ':tamano_instalador' => $entity->tamano_instalador,
        ]);

        return $application;
    }

    public function delete(ApplicationId $applicationId): void
    {
        $stmt = $this->connection->prepare('DELETE FROM aplicaciones WHERE id = :id');
        $stmt->execute([':id' => $applicationId->value()]);
    }

    public function getById(ApplicationId $applicationId): ?ApplicationModel
    {
        $stmt = $this->connection->prepare('SELECT * FROM aplicaciones WHERE id = :id LIMIT 1');
        $stmt->execute([':id' => $applicationId->value()]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row === false) {
            return null;
        }

        return ApplicationPersistenceMapper::toDomain(ApplicationEntity::fromRow($row));
    }

    public function getAll(): array
    {
        $stmt = $this->connection->query('SELECT * FROM aplicaciones ORDER BY created_at DESC');
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return array_map(
            static fn (array $row): ApplicationModel => ApplicationPersistenceMapper::toDomain(ApplicationEntity::fromRow($row)),
            $rows
        );
    }
}