<?php

declare(strict_types=1);

require_once __DIR__ . '/../../Services/Dto/Command/UpdateApplicationCommand.php';
require_once __DIR__ . '/../../Services/Dto/Response/ApplicationResponseDto.php';

interface UpdateApplicationUseCase
{
    public function execute(UpdateApplicationCommand $command): ApplicationResponseDto;
}