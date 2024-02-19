<?php

namespace Tests\Units;

use PHPUnit\Framework\TestCase;
use Tests\Units\DTO\User;

class GetterTest extends TestCase
{

    public function testCreateValidFromArray(): void
    {
        $dynamicArray = [
            'id' => '1',
            'email' => 'test@email.com',
            'city' => 1023,
            'balance' => '100.13',
            'blocked' => 'true',
            'isPremium' => 'false',
        ];

        $user = new User();
        $user->id = typer($dynamicArray)->int('id');
        $user->email = typer($dynamicArray)->string('email');
        $user->city = typer($dynamicArray)->string('city');
        $user->balance = typer($dynamicArray)->float('balance');
        $user->blocked = typer($dynamicArray)->bool('blocked');
        $user->isPremium = typer($dynamicArray)->bool('isPremium');

        $this->assertIsInt($user->id);
        $this->assertEquals(1, $user->id);

        $this->assertIsString($user->email);
        $this->assertEquals('test@email.com', $user->email);

        $this->assertIsString($user->city);
        $this->assertEquals('1023', $user->city);

        $this->assertIsFloat($user->balance);
        $this->assertEquals(100.13, $user->balance);

        $this->assertIsBool($user->blocked);
        $this->assertTrue($user->blocked);

        $this->assertIsBool($user->isPremium);
        $this->assertFalse($user->isPremium);
    }

    public function testCreateValidFromObject(): void
    {
        $dynamicObject = new \stdClass();
        $dynamicObject->id = '1';
        $dynamicObject->email = 'test@email.com';
        $dynamicObject->city = 1023;
        $dynamicObject->balance = '100.13';
        $dynamicObject->blocked = 'false';
        $dynamicObject->isPremium = 'true';


        $user = new User();
        $user->id = typer($dynamicObject)->int('id');
        $user->email = typer($dynamicObject)->string('email');
        $user->city = typer($dynamicObject)->city;
        $user->balance = typer($dynamicObject)->float('balance');
        $user->blocked = typer($dynamicObject)->bool('blocked');
        $user->isPremium = typer($dynamicObject)->bool('isPremium');

        $this->assertIsInt($user->id);
        $this->assertEquals(1, $user->id);

        $this->assertIsString($user->email);
        $this->assertEquals('test@email.com', $user->email);

        $this->assertIsString($user->city);
        $this->assertEquals('1023', $user->city);

        $this->assertIsFloat($user->balance);
        $this->assertEquals(100.13, $user->balance);

        $this->assertIsBool($user->blocked);
        $this->assertFalse($user->blocked);

        $this->assertIsBool($user->isPremium);
        $this->assertTrue($user->isPremium);
    }

    public function testEmptyValue(): void
    {
        $dynamicArray = [
            'id' => '1',
        ];

        $user = new User();
        $user->id = typer($dynamicArray)->int('id');
        $user->email = typer($dynamicArray)->string('email');
        $user->city = typer($dynamicArray)->city;
        $user->balance = typer($dynamicArray)->float('balance');
        $user->blocked = typer($dynamicArray)->bool('blocked', false);
        $user->isPremium = typer($dynamicArray)->bool('isPremium', true);

        $this->assertIsInt($user->id);
        $this->assertEquals(1, $user->id);

        $this->assertNull($user->email);
        $this->assertNull($user->city);
        $this->assertNull($user->balance);
        $this->assertIsBool($user->blocked);
        $this->assertFalse($user->blocked);
        $this->assertTrue($user->isPremium);
    }

}
