<?php

declare(strict_types=1);

require_once __DIR__ . '/../../../Domain/Models/ApplicationModel.php';
require_once __DIR__ . '/../../../Domain/ValueObjects/ApplicationId.php';

interface GetApplicationByIdPort
{
    public function getById(ApplicationId $applicationId): ?ApplicationModel;
}
