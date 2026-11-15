<?php

declare(strict_types=1);

require_once __DIR__ . '/../Ports/In/UpdateApplicationUseCase.php';
require_once __DIR__ . '/../Ports/Out/GetApplicationByIdPort.php';
require_once __DIR__ . '/../Ports/Out/UpdateApplicationPort.php';
require_once __DIR__ . '/Mappers/ApplicationMapper.php';
require_once __DIR__ . '/../../Domain/ValueObjects/ApplicationId.php';
require_once __DIR__ . '/../../Domain/Exceptions/ApplicationNotFoundException.php';

final class UpdateApplicationService implements UpdateApplicationUseCase
{
    public function __construct(
        private GetApplicationByIdPort $getApplicationByIdPort,
        private UpdateApplicationPort  $updateApplicationPort
    )
    {
    }

    public function execute(UpdateApplicationCommand $command): ApplicationResponseDto
    {
        $applicationId = new ApplicationId($command->id());
        $existing = $this->getApplicationByIdPort->getById($applicationId);

        if ($existing === null) {
            throw ApplicationNotFoundException::withId($command->id());
        }

        $updatedModel = ApplicationMapper::fromUpdateCommand($command);
        $saved = $this->updateApplicationPort->update($updatedModel);

        return ApplicationMapper::toResponseDto($saved);
    }
}