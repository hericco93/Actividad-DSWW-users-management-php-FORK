<?php

declare(strict_types=1);

require_once __DIR__ . '/../Exceptions/InvalidApplicationDataException.php';

final class ApplicationPrice
{
    private float $value;

    public function __construct(float $value)
    {
        if ($value < 0) {
            throw InvalidApplicationDataException::becauseValueIsInvalid('precio', 'El precio no puede ser negativo.');
        }

        $this->value = round($value, 2);
    }

    public function value(): float
    {
        return $this->value;
    }
}