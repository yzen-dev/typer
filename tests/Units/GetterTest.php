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
            'gender' => '',
            'balance' => '100.13',
            'blocked' => 'true',
            'isPremium' => 'false',
            'products' => ['test'],
            'emptyList' => [],
        ];

        $user = new User();
        $user->id = Typer::int($dynamicArray, 'id');
        $user->email = Typer::string($dynamicArray, 'email');
        $user->city = Typer::string($dynamicArray, 'city');
        $user->gender = Typer::string($dynamicArray, 'gender');
        $user->balance = Typer::float($dynamicArray, 'balance');
        $user->blocked = Typer::bool($dynamicArray, 'blocked');
        $user->isPremium = Typer::bool($dynamicArray, 'isPremium');
        $user->products = Typer::array($dynamicArray, 'products');
        $user->emptyList = Typer::array($dynamicArray, 'emptyList');

        $this->assertIsInt($user->id);
        $this->assertEquals(1, $user->id);

        $this->assertIsString($user->email);
        $this->assertEquals('test@email.com', $user->email);

        $this->assertNull($user->gender);
        
        $this->assertIsString($user->city);
        $this->assertEquals('1023', $user->city);

        $this->assertIsFloat($user->balance);
        $this->assertEquals(100.13, $user->balance);

        $this->assertIsBool($user->blocked);
        $this->assertTrue($user->blocked);

        $this->assertIsBool($user->isPremium);
        $this->assertFalse($user->isPremium);
        
        $this->assertIsArray($user->products);
        $this->assertCount(1, $user->products);

        $this->assertNull($user->emptyList);
    }

    public function testCreateValidFromObject(): void
    {
        $dynamicObject = new \stdClass();
        $dynamicObject->id = '1';
        $dynamicObject->email = 'test@email.com';
        $dynamicObject->gender = '';
        $dynamicObject->balance = '100.13';
        $dynamicObject->blocked = 'false';
        $dynamicObject->isPremium = 'true';
        $dynamicObject->products = ['test'];
        $dynamicObject->emptyList = [];

        $user = new User();
        $user->id = Typer::int($dynamicObject,'id');
        $user->email = Typer::string($dynamicObject,'email');
        $user->gender = Typer::float($dynamicObject,'gender');
        $user->balance = Typer::float($dynamicObject,'balance');
        $user->blocked = Typer::bool($dynamicObject,'blocked');
        $user->isPremium = Typer::bool($dynamicObject,'isPremium');
        $user->products = Typer::array($dynamicObject,'products');
        $user->emptyList = Typer::array($dynamicObject,'emptyList');

        $this->assertIsInt($user->id);
        $this->assertEquals(1, $user->id);

        $this->assertNull($user->gender);
        
        $this->assertIsString($user->email);
        $this->assertEquals('test@email.com', $user->email);
        
        $this->assertIsFloat($user->balance);
        $this->assertEquals(100.13, $user->balance);

        $this->assertIsBool($user->blocked);
        $this->assertFalse($user->blocked);

        $this->assertIsBool($user->isPremium);
        $this->assertTrue($user->isPremium);

        $this->assertIsArray($user->products);
        $this->assertCount(1, $user->products);

        $this->assertNull($user->emptyList);
    }

    public function testEmptyValue(): void
    {
        $dynamicArray = [
            'id' => '1',
            'gender' => '',
        ];

        $user = new User();
        $user->id = Typer::int($dynamicArray, 'id');
        $user->email = Typer::string($dynamicArray, 'email');
        $user->gender = Typer::string($dynamicArray, 'gender');
        $user->balance = Typer::float($dynamicArray, 'balance');
        $user->blocked = Typer::bool($dynamicArray, 'blocked', false);
        $user->isPremium = Typer::bool($dynamicArray, 'isPremium', true);
        $user->products = Typer::array($dynamicArray, 'products');
        $user->emptyList = Typer::array($dynamicArray, 'emptyList');

        $this->assertIsInt($user->id);
        $this->assertEquals(1, $user->id);

        $this->assertNull($user->gender);
        $this->assertNull($user->email);
        $this->assertNull($user->balance);
        $this->assertIsBool($user->blocked);
        $this->assertFalse($user->blocked);
        $this->assertTrue($user->isPremium);
        $this->assertNull($user->products);
        $this->assertNull($user->emptyList);
    }

}
