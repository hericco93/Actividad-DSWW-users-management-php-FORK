<?php

declare(strict_types=1);

require_once __DIR__ . '/../../Services/Dto/Query/GetApplicationByIdQuery.php';
require_once __DIR__ . '/../../Services/Dto/Response/ApplicationResponseDto.php';

interface GetApplicationByIdUseCase
{
    public function execute(GetApplicationByIdQuery $query): ApplicationResponseDto;
}