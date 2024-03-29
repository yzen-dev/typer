<?php

declare(strict_types=1);

namespace YzendDev\Typer;

/**
 * @psalm-api
 */
class Typer
{
    /**
     * Get string value of a property  from the underlying object or default (null)
     *
     * @param null|array<array-key, mixed>|object $value
     * @param string $key
     * @param null|string $default Default value if the property does not exist
     *
     * @return string|null
     * @psalm-api
     */
    public static function string($value, string $key, string $default = null): ?string
    {
        if (is_object($value)) {
            return isset($value->{$key}) && !empty($value->{$key}) ? (string)$value->{$key} : $default;
        }
        return isset($value[$key]) && !empty($value[$key]) ? (string)$value[$key] : $default;
    }

    /**
     * Get float value of a property  from the underlying object or default (null)
     *
     * @param null|array<array-key, mixed>|object $value
     * @param string $key
     * @param null|float $default Default value if the property does not exist
     *
     * @return float|null
     * @psalm-api
     */
    public static function float($value, string $key, float $default = null): ?float
    {
        if (is_object($value)) {
            return isset($value->{$key}) && !empty($value->{$key}) ? (float)$value->{$key} : $default;
        }
        return isset($value[$key]) && !empty($value[$key]) ? (float)$value[$key] : $default;
    }

    /**
     * Get integer value of a property  from the underlying object or default (null)
     *
     * @param null|array<array-key, mixed>|object $value
     * @param string $key
     * @param null|int $default Default value if the property does not exist
     *
     * @return int|null
     * @psalm-api
     */
    public static function int($value, string $key, int $default = null): ?int
    {
        if (is_object($value)) {
            return isset($value->{$key}) && !empty($value->{$key}) ? (int)$value->{$key} : $default;
        }
        return isset($value[$key]) && !empty($value[$key]) ? (int)$value[$key] : $default;
    }

    /**
     * Get array value of a property  from the underlying object or default (null)
     *
     * @param null|array<array-key, array<T>>|object $value
     * @param string $key
     * @param null|array<mixed> $default Default value if the property does not exist
     *
     * @return null|array<T>
     * @template T
     * @psalm-api
     */
    public static function array($value, string $key, array $default = null): ?array
    {
        if (is_object($value)) {
            return isset($value->{$key}) && !empty($value->{$key}) ? $value->{$key} : $default;
        }
        return isset($value[$key]) && !empty($value[$key]) ? $value[$key] : $default;
    }

    /**
     * Get boolean value of a property  from the underlying object or default (null)
     *
     * @param null|array<array-key, mixed>|object $value
     * @param string $key
     * @param null|bool $default Default value if the property does not exist
     *
     * @return bool|null
     * @psalm-api
     */
    public static function bool($value, string $key, bool $default = null): ?bool
    {
        if (is_object($value)) {
            return isset($value->{$key}) && !empty($value->{$key}) ? ($value->{$key} == 'true' ? true : false) : $default;
        }
        return isset($value[$key]) && !empty($value[$key]) ? ($value[$key] == 'true' ? true : false) : $default;
    }
}
