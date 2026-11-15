<?php

declare(strict_types=1);

require_once __DIR__ . '/../../Services/Dto/Command/DeleteApplicationCommand.php';

interface DeleteApplicationUseCase
{
    public function execute(DeleteApplicationCommand $command): void;
}