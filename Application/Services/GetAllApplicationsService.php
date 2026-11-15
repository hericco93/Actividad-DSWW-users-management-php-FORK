<?php

declare(strict_types=1);

require_once __DIR__ . '/../Ports/In/GetAllApplicationsUseCase.php';
require_once __DIR__ . '/../Ports/Out/GetAllApplicationsPort.php';
require_once __DIR__ . '/Mappers/ApplicationMapper.php';

final class GetAllApplicationsService implements GetAllApplicationsUseCase
{
    public function __construct(
        private GetAllApplicationsPort $getAllApplicationsPort
    ) {
    }

    public function execute(): array
    {
        $applications = $this->getAllApplicationsPort->getAll();

        return array_map(
            static fn (ApplicationModel $application): ApplicationResponseDto => ApplicationMapper::toResponseDto($application),
            $applications
        );
    }
}