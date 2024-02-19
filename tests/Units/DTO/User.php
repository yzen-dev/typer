<?php

declare(strict_types=1);

namespace Tests\Units\DTO;


class User
{
    public int $id;
    public ?string $email;
    public ?string $city;
    public ?float $balance;
    public ?bool $blocked;
    public ?bool $isPremium;
}
