<?php

declare(strict_types=1);

require_once __DIR__ . '/../../../Domain/Models/ApplicationModel.php';

interface UpdateApplicationPort
{
    public function update(ApplicationModel $application): ApplicationModel;
}