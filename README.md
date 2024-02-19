## Typer
![Packagist Version](https://img.shields.io/packagist/v/yzen.dev/typer?color=blue&label=version)
![GitHub Workflow Status (with branch)](https://img.shields.io/github/actions/workflow/status/yzen-dev/typer/tests.yml?branch=master)
[![Coverage](https://codecov.io/gh/yzen-dev/typer/branch/master/graph/badge.svg?token=QAO8STLPMI)](https://codecov.io/gh/yzen-dev/typer)
![License](https://img.shields.io/github/license/yzen-dev/typer)
![readthedocs](https://img.shields.io/readthedocs/typer)
![Packagist Downloads](https://img.shields.io/packagist/dm/yzen.dev/typer)
![Packagist Downloads](https://img.shields.io/packagist/dt/yzen.dev/typer)

[![Mutation testing badge](https://img.shields.io/endpoint?style=flat&url=https%3A%2F%2Fbadge-api.stryker-mutator.io%2Fgithub.com%2Fyzen-dev%2Ftyper%2Fmaster)](https://dashboard.stryker-mutator.io/reports/github.com/yzen-dev/typer/master)
[![type-coverage](https://shepherd.dev/github/yzen-dev/typer/coverage.svg)](https://shepherd.dev/github/yzen-dev/typer)
[![psalm-level](https://shepherd.dev/github/yzen-dev/typer/level.svg)](https://shepherd.dev/github/yzen-dev/typer)

This is a simple helper package that helps make the code cleaner. Often, when working with data from third-party sources, such as website parsing, you need to write hundreds of lines of code to check for a particular property.

Most likely, you write a lot of if or ternary operators, and your code looks something like this:
 ```php
$user = new User();
$user->id = isset($dynamicArray['id']) ? (int)$dynamicArray['id'] : null;
$user->email = isset($dynamicArray['email']) ? (string)$dynamicArray['email'] : null;
$user->balance = isset($dynamicArray['balance']) ? (float)$dynamicArray['balance'] : null;
$user->blocked = isset($dynamicArray['blocked']) ? ($dynamicArray['blocked'] === 'true' ? true : false) : null;
```

When using **Typer**, you don't need to worry about a lot of checks and transformations. Simply wrap the code in the `typer` method:

```php
$user = new User();
$user->id = typer($dynamicArray)->int('id');
$user->email = typer($dynamicArray)->string('email');
$user->balance = typer($dynamicArray)->float('balance');
$user->blocked = typer($dynamicArray)->bool('blocked');
```

If, in the absence of a parameter, you need to specify a default value other than "null", you can simply pass it as the second argument:
```php
$user->balance = typer($dynamicArray)->float('balance', null);
```
## **Installation**

The package can be installed via composer:

```
composer require yzen.dev/typer
```
