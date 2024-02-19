<?php

namespace YzendDev\Typer;

class Typer
{
    /**
     * The underlying object.
     *
     * @var null|array<array-key, mixed>|object
     */
    private $value;

    /**
     * Create new instance.
     *
     * @param null|array|object $value
     *
     * @return void
     */
    public function __construct($value = null)
    {
        $this->value = $value;
    }

    /**
     * Get string value of a property  from the underlying object or default (null)
     *
     * @param string $key
     * @param null|string $default Default value if the property does not exist
     *
     * @return string|null
     * @psalm-api
     */
    public function string(string $key, string $default = null): ?string
    {
        if (is_object($this->value)) {
            return isset($this->value->{$key}) ? (string)$this->value->{$key} : $default;
        }
        return isset($this->value[$key]) ? (string)$this->value[$key] : $default;
    }

    /**
     * Get float value of a property  from the underlying object or default (null)
     *
     * @param string $key
     * @param null|float $default Default value if the property does not exist
     *
     * @return float|null
     * @psalm-api
     */
    public function float(string $key, float $default = null): ?float
    {
        if (is_object($this->value)) {
            return isset($this->value->{$key}) ? (float)$this->value->{$key} : $default;
        }
        return isset($this->value[$key]) ? (float)$this->value[$key] : $default;
    }

    /**
     * Get integer value of a property  from the underlying object or default (null)
     *
     * @param string $key
     * @param null|int $default Default value if the property does not exist
     *
     * @return int|null
     * @psalm-api
     */
    public function int(string $key, int $default = null): ?int
    {
        if (is_object($this->value)) {
            return isset($this->value->{$key}) ? (int)$this->value->{$key} : $default;
        }
        return isset($this->value[$key]) ? (int)$this->value[$key] : $default;
    }

    /**
     * Get boolean value of a property  from the underlying object or default (null)
     *
     * @param string $key
     * @param null|bool $default Default value if the property does not exist
     *
     * @return bool|null
     * @psalm-api
     */
    public function bool(string $key, bool $default = null): ?bool
    {
        if (is_object($this->value)) {
            return isset($this->value->{$key}) ? ($this->value->{$key} == 'true' ? true : false) : $default;
        }
        return isset($this->value[$key]) ? ($this->value[$key] == 'true' ? true : false) : $default;
    }

    /**
     * Dynamically access a property on the underlying object.
     *
     * @param string $key
     *
     * @psalm-api
     * @return mixed
     */
    public function __get(string $key)
    {
        if (is_object($this->value)) {
            return $this->value->{$key} ?? null;
        }
        return $this->value[$key] ?? null;
    }
}
