<?php

declare(strict_types=1);

require_once __DIR__ . '/../Ports/In/DeleteApplicationUseCase.php';
require_once __DIR__ . '/../Ports/Out/GetApplicationByIdPort.php';
require_once __DIR__ . '/../Ports/Out/DeleteApplicationPort.php';
require_once __DIR__ . '/../../Domain/ValueObjects/ApplicationId.php';
require_once __DIR__ . '/../../Domain/Exceptions/ApplicationNotFoundException.php';

final class DeleteApplicationService implements DeleteApplicationUseCase
{
    public function __construct(
        private GetApplicationByIdPort $getApplicationByIdPort,
        private DeleteApplicationPort $deleteApplicationPort
    ) {
    }

    public function execute(DeleteApplicationCommand $command): void
    {
        $applicationId = new ApplicationId($command->id());
        $existing = $this->getApplicationByIdPort->getById($applicationId);

        if ($existing === null) {
            throw ApplicationNotFoundException::withId($command->id());
        }

        $this->deleteApplicationPort->delete($applicationId);
    }
}
