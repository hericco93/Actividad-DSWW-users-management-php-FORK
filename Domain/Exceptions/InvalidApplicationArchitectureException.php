<?php

declare(strict_types=1);

final class InvalidApplicationArchitectureException extends InvalidArgumentException
{
    public static function becauseBitsAreNotAllowed(int $bits): self
    {
        return new self(sprintf('La arquitectura de %d bits no es válida. Solo se permite 32 o 64 bits.', $bits));
    }
}

