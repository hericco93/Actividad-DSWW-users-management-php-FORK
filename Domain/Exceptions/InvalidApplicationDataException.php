<?php

declare(strict_types=1);

final class InvalidApplicationDataException extends InvalidArgumentException
{
    public static function becauseFieldIsEmpty(string $field): self
    {
        return new self(sprintf('El campo "%s" de la aplicación es obligatorio y no puede estar vacío.', $field));
    }

    public static function becauseValueIsInvalid(string $field, string $reason): self
    {
        return new self(sprintf('El campo "%s" no es válido: %s', $field, $reason));
    }
}