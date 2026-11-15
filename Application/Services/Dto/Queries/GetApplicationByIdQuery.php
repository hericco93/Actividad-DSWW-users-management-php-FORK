<?php

declare(strict_types=1);

final class GetApplicationByIdQuery
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