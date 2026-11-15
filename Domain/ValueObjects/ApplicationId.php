<?php

declare(strict_types=1);

require_once __DIR__ . '/../Exceptions/InvalidApplicationIdException.php';

final class ApplicationId
{
    private string $value;

    public function __construct(string $value)
    {
        $normalized = trim($value);

        if ($normalized === '') {
            throw InvalidApplicationIdException::becauseItIsEmpty();
        }

        $this->value = $normalized;
    }

    public function value(): string
    {
        return $this->value;
    }

    public function equals(self $other): bool
    {
        return $this->value === $other->value();
    }
}