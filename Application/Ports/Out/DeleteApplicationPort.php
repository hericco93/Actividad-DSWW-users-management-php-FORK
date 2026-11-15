<?php

declare(strict_types=1);

require_once __DIR__ . '/../../../Domain/ValueObjects/ApplicationId.php';

interface DeleteApplicationPort
{
    public function delete(ApplicationId $applicationId): void;
}
