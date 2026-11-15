<?php

declare(strict_types=1);

require_once __DIR__ . '/../Exceptions/InvalidApplicationDataException.php';

final class ApplicationContactEmail
{
    private string $value;

    public function __construct(string $value)
    {
        $normalized = trim($value);

        if ($normalized === '') {
            throw InvalidApplicationDataException::becauseFieldIsEmpty('correo');
        }

        if (filter_var($normalized, FILTER_VALIDATE_EMAIL) === false) {
            throw InvalidApplicationDataException::becauseValueIsInvalid('correo', 'Debe ser una dirección de correo electrónico válida.');
        }

        $this->value = $normalized;
    }

    public function value(): string
    {
        return $this->value;
    }
}