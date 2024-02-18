<?php

use YzendDev\Typer\Typer;

if (!function_exists('typer')) {
    /**
     * Provide access to optional objects.
     *
     * @param array<array-key, mixed>|object $value
     *
     * @return Typer
     * @psalm-api
     */
    function typer($value = null)
    {
        return new Typer($value);
    }
}
