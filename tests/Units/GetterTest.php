<?php

namespace Tests\Units;

use PHPUnit\Framework\TestCase;
use Tests\Units\DTO\User;
use YzendDev\Typer\Typer;

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
        $user->id = Typer::int($dynamicArray, 'id');
        $user->email = Typer::string($dynamicArray, 'email');
        $user->city = Typer::string($dynamicArray, 'city');
        $user->balance = Typer::float($dynamicArray, 'balance');
        $user->blocked = Typer::bool($dynamicArray, 'blocked');
        $user->isPremium = Typer::bool($dynamicArray, 'isPremium');

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
        $dynamicObject->balance = '100.13';
        $dynamicObject->blocked = 'false';
        $dynamicObject->isPremium = 'true';


        $user = new User();
        $user->id = Typer::int($dynamicObject,'id');
        $user->email = Typer::string($dynamicObject,'email');
        $user->balance = Typer::float($dynamicObject,'balance');
        $user->blocked = Typer::bool($dynamicObject,'blocked');
        $user->isPremium = Typer::bool($dynamicObject,'isPremium');

        $this->assertIsInt($user->id);
        $this->assertEquals(1, $user->id);

        $this->assertIsString($user->email);
        $this->assertEquals('test@email.com', $user->email);
        
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
        $user->id = Typer::int($dynamicArray, 'id');
        $user->email = Typer::string($dynamicArray, 'email');
        $user->balance = Typer::float($dynamicArray, 'balance');
        $user->blocked = Typer::bool($dynamicArray, 'blocked', false);
        $user->isPremium = Typer::bool($dynamicArray, 'isPremium', true);

        $this->assertIsInt($user->id);
        $this->assertEquals(1, $user->id);

        $this->assertNull($user->email);
        $this->assertNull($user->balance);
        $this->assertIsBool($user->blocked);
        $this->assertFalse($user->blocked);
        $this->assertTrue($user->isPremium);
    }

}
