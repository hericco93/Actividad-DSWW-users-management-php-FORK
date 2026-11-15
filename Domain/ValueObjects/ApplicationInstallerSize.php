<?php

declare(strict_types=1);

require_once __DIR__ . '/../Exceptions/InvalidApplicationDataException.php';

final class ApplicationInstallerSize
{
    private float $value;

    public function __construct(float $value)
    {
        if ($value <= 0) {
            throw InvalidApplicationDataException::becauseValueIsInvalid('tamanoInstalador', 'El tamaño del instalador (en MB) debe ser mayor a 0.');
        }

        $this->value = round($value, 2);
    }

    public function value(): float
    {
        return $this->value;
    }
}
