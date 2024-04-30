<?php

namespace App\Trait;

use ReflectionClass;

trait EnumUtilityTrait
{
    public static function enumToArray(): array
    {
        $reflection = new ReflectionClass(static::class);

        return $reflection->getConstants();
    }

    public static function enumValueExists(string $valueToCheck): bool
    {
        foreach (self::enumToArray() as $enum) {
            if ($enum->value === $valueToCheck) return true;
        }

        return false;
    }
}
