<?php

declare(strict_types=1);

final class DeleteApplicationCommand
{
    public function __construct(
        private string $id
    ) {
    }

    public function id(): string
    {
        return $this->id;
    }
}