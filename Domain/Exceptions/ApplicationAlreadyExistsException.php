<?php

declare(strict_types=1);

final class ApplicationAlreadyExistsException extends RuntimeException
{
    public static function withNameAndProvider(string $name, string $provider): self
    {
        return new self(sprintf('Ya existe una aplicación llamada "%s" del proveedor "%s".', $name, $provider));
    }
}