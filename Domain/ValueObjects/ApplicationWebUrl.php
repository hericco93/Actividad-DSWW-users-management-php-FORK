<?php

declare(strict_types=1);

require_once __DIR__ . '/../Exceptions/InvalidApplicationDataException.php';

final class ApplicationWebUrl
{
    private string $value;

    public function __construct(string $value)
    {
        $normalized = trim($value);

        if ($normalized === '') {
            throw InvalidApplicationDataException::becauseFieldIsEmpty('web');
        }

        if (filter_var($normalized, FILTER_VALIDATE_URL) === false) {
            throw InvalidApplicationDataException::becauseValueIsInvalid('web', 'Debe ser una URL válida (ej. https://ejemplo.com).');
        }

        $this->value = $normalized;
    }

    public function value(): string
    {
        return $this->value;
    }
}