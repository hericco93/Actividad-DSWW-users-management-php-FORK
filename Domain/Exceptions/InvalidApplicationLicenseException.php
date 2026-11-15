<?php

declare(strict_types=1);

final class InvalidApplicationLicenseException extends InvalidArgumentException
{
    public static function becauseLicenseIsNotAllowed(string $license): self
    {
        return new self(sprintf('El tipo de licencia "%s" no es válido.', $license));
    }
}
