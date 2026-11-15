<?php

declare(strict_types=1);

require_once __DIR__ . '/../Exceptions/InvalidApplicationArchitectureException.php';

final class ApplicationBitsEnum
{
    public const BITS_32 = 32;
    public const BITS_64 = 64;

    private int $value;

    public function __construct(int $value)
    {
        if (!in_array($value, array(self::BITS_32, self::BITS_64), true)) {
            throw InvalidApplicationArchitectureException::becauseBitsAreNotAllowed($value);
        }

        $this->value = $value;
    }

    public function value(): int
    {
        return $this->value;
    }

    /**
     * @return int[]
     */
    public static function allowedValues(): array
    {
        return array(self::BITS_32, self::BITS_64);
    }
}
