<?php

declare(strict_types=1);

require_once __DIR__ . '/../../Services/Dto/Response/ApplicationResponseDto.php';

interface GetAllApplicationsUseCase
{
    /**
     * @return ApplicationResponseDto[]
     */
    public function execute(): array;
}