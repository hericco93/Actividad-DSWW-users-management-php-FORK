<?php

declare(strict_types=1);

require_once __DIR__ . '/EventDomain.php';
require_once __DIR__ . '/../Models/ApplicationModel.php';

final class ApplicationCreatedDomainEvent extends DomainEvent
{
    private string $applicationId;
    private string $nombre;

    public function __construct(ApplicationModel $application)
    {
        parent::__construct('application.created');
        $this->applicationId = $application->id()->value();
        $this->nombre = $application->nombre();
    }

    public function applicationId(): string
    {
        return $this->applicationId;
    }

    public function nombre(): string
    {
        return $this->nombre;
    }
}
