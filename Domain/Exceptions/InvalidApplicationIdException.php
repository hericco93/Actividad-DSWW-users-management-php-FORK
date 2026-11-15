<?php

declare(strict_types=1);

final class InvalidApplicationIdException extends InvalidArgumentException
{
    public static function becauseItIsEmpty(): self
    {
        return new self('El identificador de la aplicación no puede estar vacío.');
    }
}