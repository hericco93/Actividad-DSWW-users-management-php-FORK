<?php

declare(strict_types=1);

require_once __DIR__ . '/../Exceptions/InvalidApplicationLicenseException.php';

final class ApplicationLicenseEnum
{
    public const FREEWARE = 'Freeware';
    public const OPEN_SOURCE = 'Open Source';
    public const COMERCIAL = 'Comercial';
    public const FREEMIUM = 'Freemium';
    public const SHAREWARE = 'Shareware';

    private string $value;

    public function __construct(string $value)
    {
        $normalized = trim($value);

        if (!in_array($normalized, self::allowedValues(), true)) {
            throw InvalidApplicationLicenseException::becauseLicenseIsNotAllowed($normalized);
        }

        $this->value = $normalized;
    }

    public function value(): string
    {
        return $this->value;
    }

    /**
     * @return string[]
     */
    public static function allowedValues(): array
    {
        return array(
            self::FREEWARE,
            self::OPEN_SOURCE,
            self::COMERCIAL,
            self::FREEMIUM,
            self::SHAREWARE,
        );
    }
}

