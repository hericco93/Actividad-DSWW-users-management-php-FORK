<?php

declare(strict_types=1);

require_once __DIR__ . '/../../../Domain/Models/ApplicationModel.php';

interface GetAllApplicationsPort
{
    /**
     * @return ApplicationModel[]
     */
    public function getAll(): array;
}