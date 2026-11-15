<?php

declare(strict_types=1);

require_once __DIR__ . '/EventDomain.php';

final class ApplicationDeletedDomainEvent extends DomainEvent
{
    private string $applicationId;

    public function __construct(string $applicationId)
    {
        parent::__construct('application.deleted');
        $this->applicationId = $applicationId;
    }

    public function applicationId(): string
    {
        return $this->applicationId;
    }
}