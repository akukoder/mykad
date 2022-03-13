# MyKad

Extract information from MyKad/MyKid number, validate the input from user and generate Faker data.

## About MyKad

<blockquote>
    The Government Multi-Purpose Smart Card Project (MPSC) or MyKad is part of the Multimedia Super Corridor (MSC Malaysia) initiative.
</blockquote>

## Introduction

This package provides:

1. Data extraction 
2. Input validation
3. [Faker Provider](https://faker.readthedocs.io/en/master/providers.html) to generate fake MyKad number (for Laravel)

## Installation

You can install the package via composer:

```shell
composer require akukoder/mykad
```

## Data Extraction
With this package, your can extract some information from the MyKad/MyKid:

1. Date of Birth
2. State name
3. Gender

### Date of birth
Get date of birth from the input.
```php
use AkuKoder\MyKad\Extractor as MyKadExtractor;

echo (new MyKadExtractor('871003417888'))->dateOfBirth();
// Result: 1987-10-03

echo (new MyKadExtractor('871003417888'))->dateOfBirth('d/m/Y');

// Result: 03/10/1987
```
### Gender
Get gender from the input. Basically, 1 for female and 0 for male.
```php
use AkuKoder\MyKad\Extractor as MyKadExtractor;

echo (new MyKadExtractor('871003417888'))->gender();

// Result: 1
```

### State
Get state name from the input.
```php
use AkuKoder\MyKad\Extractor as MyKadExtractor;

echo (new MyKadExtractor('871003417888'))->stateName();

// Result: Selangor
```

## Validation
One of the most annoying thing when dealing with user records is when they entered wrong MyKad/MyKid number. 
This package helps reduce the burden to deal with invalid input by users.

This package will validate MyKad/MyKid number to make sure:

- Contains numbers only
- Valid length 
- Valid date of birth
- Valid state/country code

***Note:***

Any other unnecessary characters from the input will be removed, including dashes.

### Usage

```php
use AkuKoder\MyKadValidator\Validator;

// Check for invalid date
if ((new Validator)->validate('982404-06-5883')) {
    // Result: false
}

// Check for invalid length
if ((new Validator)->validate('982404-06-83')) {
    // Result: false    
}

// Check for invalid state code
if ((new Validator)->validate('980404-00-5335')) {
    // Result: false
}

// Check for invalid characters
if ((new Validator)->validate('9804AA-00-5335')) {
    // Result: false
}

// All passes
if ((new Validator)->validate('980404-06-5335')) {
    // Result: true
}
```

### Get exception on errors

```php
use AkuKoder\MyKadValidator\Validator;

$validator = new Validator;

if ($validator->validate('982404-06-5883', true)) {
    // This will throw \AkuKoder\MyKadValidator\Exceptions\InvalidDateException    
}

if ($validator->validate('982404-06-83', true)) {
    // This will throw \AkuKoder\MyKadValidator\Exceptions\InvalidLengthException    
}

if ($validator->validate('980404-00-5335', true)) {
    // This will throw \AkuKoder\MyKadValidator\Exceptions\InvalidCodeException    
}

if ($validator->validate('9804AA-00-5335', true)) {
    // This will throw \AkuKoder\MyKadValidator\Exceptions\InvalidCharacterException    
}
```

## Faker Provider

To generate dummy data for your test or model factory, add these to on of your service provider or create new one. Let's 
create a new service provider:

```shell
php artisan make:provider FakerServiceProvider
```

Register MyKadProvider in register method.

```php
<?php

namespace App\Providers;

use AkuKoder\MyKad\Faker\MyKadProvider;
use Faker\{Factory, Generator};
use Illuminate\Support\ServiceProvider;

class FakerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->singleton(Generator::class, function () {
            $faker = Factory::create();
            $faker->addProvider(new MyKadProvider($faker));

            return $faker;
        });
    }
}
```
Make sure to include the additional Laravel service provider in the ```/config/app.php``` file.

```php
'providers' => [
    App\Providers\FakerServiceProvider::class,
],
```

Now you can use the new formatter like the other Faker formatters. In a Laravel factory, the syntax for the custom 
formatter looks like this:

```php
public function definition(): array
{
    return [
        'ic_number' => $this->faker->mykad,
    ];
}
```

## Testing

```
composer test
```

## Credits

1. [https://www.jpn.gov.my/en/faq/faq-identity-card](https://www.jpn.gov.my/en/faq/faq-identity-card)
2. [https://hofmannsven.com/2021/faker-provider-in-laravel](https://hofmannsven.com/2021/faker-provider-in-laravel)

## License

The MIT License (MIT).