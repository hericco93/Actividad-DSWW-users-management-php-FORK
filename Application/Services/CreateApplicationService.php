<?php

declare(strict_types=1);

require_once __DIR__ . '/../Ports/In/CreateApplicationUseCase.php';
require_once __DIR__ . '/../Ports/Out/SaveApplicationPort.php';
require_once __DIR__ . '/../Ports/Out/GetAllApplicationsPort.php';
require_once __DIR__ . '/Mappers/ApplicationMapper.php';
require_once __DIR__ . '/../../Domain/Exceptions/ApplicationAlreadyExistsException.php';

final class CreateApplicationService implements CreateApplicationUseCase
{
    public function __construct(
        private SaveApplicationPort $saveApplicationPort,
        private GetAllApplicationsPort $getAllApplicationsPort
    ) {
    }

    public function execute(CreateApplicationCommand $command): ApplicationResponseDto
    {
        $existingApplications = $this->getAllApplicationsPort->getAll();
        foreach ($existingApplications as $existing) {
            if (
                mb_strtolower($existing->nombre()) === mb_strtolower(trim($command->nombre())) &&
                mb_strtolower($existing->proveedor()) === mb_strtolower(trim($command->proveedor()))
            ) {
                throw ApplicationAlreadyExistsException::withNameAndProvider($command->nombre(), $command->proveedor());
            }
        }

        $generatedId = uniqid('app_', true);
        $model = ApplicationMapper::fromCreateCommand($command, $generatedId);
        $saved = $this->saveApplicationPort->save($model);

        return ApplicationMapper::toResponseDto($saved);
    }
}
