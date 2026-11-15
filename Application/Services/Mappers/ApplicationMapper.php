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
require_once __DIR__ . '/../Dto/Command/CreateApplicationCommand.php';
require_once __DIR__ . '/../Dto/Command/UpdateApplicationCommand.php';
require_once __DIR__ . '/../Dto/Response/ApplicationResponseDto.php';

final class ApplicationMapper
{
    public static function fromCreateCommand(CreateApplicationCommand $command, string $generatedId): ApplicationModel
    {
        return new ApplicationModel(
            new ApplicationId($generatedId),
            $command->nombre(),
            $command->proveedor(),
            $command->categoria(),
            $command->lenguajePrincipal(),
            $command->lenguajeSecundario(),
            $command->usaBd(),
            $command->requiereConexionRed(),
            new ApplicationBitsEnum($command->numBits()),
            $command->sistemaOperativo(),
            $command->requisitosHardware(),
            new ApplicationLicenseEnum($command->licencia()),
            new ApplicationPrice($command->precio()),
            $command->descripcion(),
            new ApplicationWebUrl($command->web()),
            new ApplicationContactEmail($command->correo()),
            new ApplicationInstallerSize($command->tamanoInstalador())
        );
    }

    public static function fromUpdateCommand(UpdateApplicationCommand $command): ApplicationModel
    {
        return new ApplicationModel(
            new ApplicationId($command->id()),
            $command->nombre(),
            $command->proveedor(),
            $command->categoria(),
            $command->lenguajePrincipal(),
            $command->lenguajeSecundario(),
            $command->usaBd(),
            $command->requiereConexionRed(),
            new ApplicationBitsEnum($command->numBits()),
            $command->sistemaOperativo(),
            $command->requisitosHardware(),
            new ApplicationLicenseEnum($command->licencia()),
            new ApplicationPrice($command->precio()),
            $command->descripcion(),
            new ApplicationWebUrl($command->web()),
            new ApplicationContactEmail($command->correo()),
            new ApplicationInstallerSize($command->tamanoInstalador())
        );
    }

    public static function toResponseDto(ApplicationModel $model): ApplicationResponseDto
    {
        return new ApplicationResponseDto(
            $model->id()->value(),
            $model->nombre(),
            $model->proveedor(),
            $model->categoria(),
            $model->lenguajePrincipal(),
            $model->lenguajeSecundario(),
            $model->usaBd(),
            $model->requiereConexionRed(),
            $model->numBits()->value(),
            $model->sistemaOperativo(),
            $model->requisitosHardware(),
            $model->licencia()->value(),
            $model->precio()->value(),
            $model->descripcion(),
            $model->web()->value(),
            $model->correo()->value(),
            $model->tamanoInstalador()->value()
        );
    }
}