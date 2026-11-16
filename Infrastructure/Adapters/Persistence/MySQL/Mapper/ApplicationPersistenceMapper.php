<?php

declare(strict_types=1);

require_once __DIR__ . '/../../../Domain/Models/ApplicationModel.php';
require_once __DIR__ . '/../../../Domain/ValueObjects/ApplicationId.php';
require_once __DIR__ . '/../../../Domain/ValueObjects/ApplicationPrice.php';
require_once __DIR__ . '/../../../Domain/ValueObjects/ApplicationInstallerSize.php';
require_once __DIR__ . '/../../../Domain/ValueObjects/ApplicationWebUrl.php';
require_once __DIR__ . '/../../../Domain/ValueObjects/ApplicationContactEmail.php';
require_once __DIR__ . '/../../../Domain/Enums/ApplicationBitsEnum.php';
require_once __DIR__ . '/../../../Domain/Enums/ApplicationLicenseEnum.php';
require_once __DIR__ . '/../Entities/ApplicationEntity.php';

final class ApplicationPersistenceMapper
{
    public static function toEntity(ApplicationModel $model): ApplicationEntity
    {
        $entity = new ApplicationEntity();
        $entity->id = $model->id()->value();
        $entity->nombre = $model->nombre();
        $entity->proveedor = $model->proveedor();
        $entity->categoria = $model->categoria();
        $entity->lenguaje_principal = $model->lenguajePrincipal();
        $entity->lenguaje_secundario = $model->lenguajeSecundario();
        $entity->usa_bd = $model->usaBd() ? 1 : 0;
        $entity->requiere_conexion_red = $model->requiereConexionRed() ? 1 : 0;
        $entity->num_bits = $model->numBits()->value();
        $entity->sistema_operativo = $model->sistemaOperativo();
        $entity->requisitos_hardware = $model->requisitosHardware();
        $entity->licencia = $model->licencia()->value();
        $entity->precio = $model->precio()->value();
        $entity->descripcion = $model->descripcion();
        $entity->web = $model->web()->value();
        $entity->correo = $model->correo()->value();
        $entity->tamano_instalador = $model->tamanoInstalador()->value();

        return $entity;
    }

    public static function toDomain(ApplicationEntity $entity): ApplicationModel
    {
        return new ApplicationModel(
            new ApplicationId($entity->id),
            $entity->nombre,
            $entity->proveedor,
            $entity->categoria,
            $entity->lenguaje_principal,
            $entity->lenguaje_secundario,
            $entity->usa_bd === 1,
            $entity->requiere_conexion_red === 1,
            new ApplicationBitsEnum($entity->num_bits),
            $entity->sistema_operativo,
            $entity->requisitos_hardware,
            new ApplicationLicenseEnum($entity->licencia),
            new ApplicationPrice($entity->precio),
            $entity->descripcion,
            new ApplicationWebUrl($entity->web),
            new ApplicationContactEmail($entity->correo),
            new ApplicationInstallerSize($entity->tamano_instalador)
        );
    }
}