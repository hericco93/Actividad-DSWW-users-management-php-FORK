<?php

declare(strict_types=1);

final class ApplicationNotFoundException extends RuntimeException
{
    public static function withId(string $id): self
    {
        return new self(sprintf('No se encontró ninguna aplicación con el ID "%s".', $id));
    }
}
