# FilamentPHP form component for input formatting using cleave-zen

[![Latest Version on Packagist](https://img.shields.io/packagist/v/agungsp/filament-cleave-input.svg?style=flat-square)](https://packagist.org/packages/agungsp/filament-cleave-input)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/agungsp/filament-cleave-input/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/agungsp/filament-cleave-input/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/agungsp/filament-cleave-input/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/agungsp/filament-cleave-input/actions?query=workflow%3A"Fix+PHP+code+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/agungsp/filament-cleave-input.svg?style=flat-square)](https://packagist.org/packages/agungsp/filament-cleave-input)



This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require agungsp/filament-cleave-input
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="filament-cleave-input-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="filament-cleave-input-config"
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="filament-cleave-input-views"
```

This is the contents of the published config file:

```php
return [
];
```

## Usage

```php
$filamentCleaveInput = new Agungsp\FilamentCleaveInput();
echo $filamentCleaveInput->echoPhrase('Hello, Agungsp!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Agung Setyo Pribadi](https://github.com/agungsp)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
