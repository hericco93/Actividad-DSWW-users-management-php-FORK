<?php

declare(strict_types=1);

require_once __DIR__ . '/../../Services/Dto/Command/CreateApplicationCommand.php';
require_once __DIR__ . '/../../Services/Dto/Response/ApplicationResponseDto.php';

interface CreateApplicationUseCase
{
    public function execute(CreateApplicationCommand $command): ApplicationResponseDto;
}
