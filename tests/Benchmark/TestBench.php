<?php

namespace Tests\Benchmark;

use PHPUnit\Framework\TestCase;
use Tests\Units\DTO\User;

/**
 * Class CheckBench
 *
 * @package Tests\Benchmark
 *
 * ./vendor/bin/phpbench run tests/Benchmark/TestBench.php --report=default
 */
class TestBench extends TestCase
{
    public function __construct()
    {
        parent::__construct('bench');
    }


    /**
     * @Revs(10000)
     */
    public function benchTyper(): void
    {
        $dynamicArray = [
            'id' => '1',
            'email' => 'test@email.com',
            'balance' => '100.13',
            'blocked' => 'true',
        ];

        $user = new User();
        $user->id = typer($dynamicArray)->int('id');
        $user->email = typer($dynamicArray)->string('email');
        $user->balance = typer($dynamicArray)->float('balance');
        $user->blocked = typer($dynamicArray)->bool('blocked');
    }
    
    /**
     * @Revs(10000)
     */
    public function benchBaseCode(): void
    {
        $dynamicArray = [
            'id' => '1',
            'email' => 'test@email.com',
            'balance' => '100.13',
            'blocked' => 'true',
        ];

        $user = new User();
        $user->id = isset($dynamicArray['id']) ? (int)$dynamicArray['id'] : null;
        $user->email = isset($dynamicArray['email']) ? (string)$dynamicArray['email'] : null;
        $user->balance = isset($dynamicArray['balance']) ? (float)$dynamicArray['balance'] : null;
        $user->blocked = isset($dynamicArray['blocked']) ? ($dynamicArray['blocked'] === 'true' ? true : false) : null;

    }
}
