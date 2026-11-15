<?php

declare(strict_types=1);

require_once __DIR__ . '/../Ports/In/GetApplicationByIdUseCase.php';
require_once __DIR__ . '/../Ports/Out/GetApplicationByIdPort.php';
require_once __DIR__ . '/Mappers/ApplicationMapper.php';
require_once __DIR__ . '/../../Domain/ValueObjects/ApplicationId.php';
require_once __DIR__ . '/../../Domain/Exceptions/ApplicationNotFoundException.php';

final class GetApplicationByIdService implements GetApplicationByIdUseCase
{
    public function __construct(
        private GetApplicationByIdPort $getApplicationByIdPort
    ) {
    }

    public function execute(GetApplicationByIdQuery $query): ApplicationResponseDto
    {
        $applicationId = new ApplicationId($query->id());
        $application = $this->getApplicationByIdPort->getById($applicationId);

        if ($application === null) {
            throw ApplicationNotFoundException::withId($query->id());
        }

        return ApplicationMapper::toResponseDto($application);
    }
}