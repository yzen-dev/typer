<?php

namespace Tests\Units;

use Tests\Units\DTO\User;
use PHPUnit\Framework\TestCase;

class GetterTest extends TestCase
{

    public function testCreateValidProperty(): void
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

        $this->assertIsInt($user->id);
        $this->assertEquals(1, $user->id);

        $this->assertIsString($user->email);
        $this->assertEquals('test@email.com', $user->email);

        $this->assertIsFloat($user->balance);
        $this->assertEquals(100.13, $user->balance);

        $this->assertIsBool($user->blocked);
        $this->assertEquals(true, $user->blocked);
    }
    public function testEmptyValue(): void
    {
        $dynamicArray = [
            'id' => '1',
        ];

        $user = new User();
        $user->id = typer($dynamicArray)->int('id');
        $user->email = typer($dynamicArray)->string('email');
        $user->balance = typer($dynamicArray)->float('balance');
        $user->blocked = typer($dynamicArray)->bool('blocked');

        $this->assertIsInt($user->id);
        $this->assertEquals(1, $user->id);

        $this->assertNull($user->email);
        $this->assertNull($user->balance);
        $this->assertNull($user->blocked);
    }

}
