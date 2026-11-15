<?php

declare(strict_types=1);

require_once __DIR__ . '/../../../Domain/Models/ApplicationModel.php';

interface SaveApplicationPort
{
    public function save(ApplicationModel $application): ApplicationModel;
}