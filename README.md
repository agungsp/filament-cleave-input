# Filament Cleave Input

[![Latest Version on Packagist](https://img.shields.io/packagist/v/agungsp/filament-cleave-input.svg?style=flat-square)](https://packagist.org/packages/agungsp/filament-cleave-input)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/agungsp/filament-cleave-input/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/agungsp/filament-cleave-input/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/agungsp/filament-cleave-input/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/agungsp/filament-cleave-input/actions?query=workflow%3A"Fix+PHP+code+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/agungsp/filament-cleave-input.svg?style=flat-square)](https://packagist.org/packages/agungsp/filament-cleave-input)

A powerful Cleave.js (using `cleave-zen`) input masking component for Filament v3. This package provides a native Filament-like developer experience to enforce input formatting rules, such as credit card numbers, phone numbers, dates, times, and numeral formatting. State unformatting is automatically handled before hydrating the form state to backend.

## Requirements

- PHP 8.1+
- Filament v3.0+

## Installation

You can install the package via composer:

```bash
composer require agungsp/filament-cleave-input
```

Optionally, you can publish the views using:

```bash
php artisan vendor:publish --tag="filament-cleave-input-views"
```

## Usage

Simply use the `CleaveInput` component in your Filament Forms schema.

```php
use Agungsp\FilamentCleaveInput\Forms\Components\CleaveInput;

CleaveInput::make('card_number')
    ->creditCard()
    ->label('Credit Card Number');
```

### Credit Card

```php
CleaveInput::make('credit_card')
    ->creditCard()
```

### Numeral Formatting

```php
use Agungsp\FilamentCleaveInput\Enums\NumeralThousandGroupStyle;

CleaveInput::make('price')
    ->numeral()
    ->numeralThousandsGroupStyle(NumeralThousandGroupStyle::THOUSAND) // or 'thousand', 'lakh', 'wan', 'none'
    ->numeralDecimalMark(',')
    ->numeralDecimalScale(2)
    ->numeralIntegerScale(5)
    ->numeralPositiveOnly()
    ->stripLeadingZeroes()
```

### Date

```php
use Agungsp\FilamentCleaveInput\Enums\DateUnit;

CleaveInput::make('date_of_birth')
    ->date()
    ->datePattern([DateUnit::YEAR, DateUnit::MONTH, DateUnit::DAY]) // or ['Y', 'm', 'd']
    ->dateMin('2000-01-01')
    ->dateMax('2024-12-31')
```

### Time

```php
use Agungsp\FilamentCleaveInput\Enums\TimeUnit;
use Agungsp\FilamentCleaveInput\Enums\TimeFormat;

CleaveInput::make('time')
    ->time()
    ->timePattern([TimeUnit::HOUR, TimeUnit::MINUTE]) // or ['h', 'm']
    ->timeFormat(TimeFormat::TWELVE) // or '12', '24'
```

### Custom Blocks

```php
CleaveInput::make('phone')
    ->blocks([4, 3, 3, 4])
    ->delimiter('-')
    ->uppercase()
    ->numericOnly()
```

## Available Methods

The component ships with extensive configuration methods mapped to `cleave-zen`'s JavaScript configuration options:

### Mask Types
- `creditCard()`
- `numeral(bool $enabled = true)`
- `date(bool $enabled = true)`
- `time(bool $enabled = true)`

### Numeral Options
- `numeralThousandsGroupStyle(\Agungsp\FilamentCleaveInput\Enums\NumeralThousandGroupStyle | string $style)`
- `numeralIntegerScale(int $scale)`
- `numeralDecimalScale(int $scale)`
- `numeralDecimalMark(string $mark)`
- `numeralPositiveOnly(bool $positiveOnly = true)`
- `stripLeadingZeroes(bool $strip = true)`

### Date Options
- `datePattern(array $pattern)`
- `dateMin(string $min)`
- `dateMax(string $max)`

### Time Options
- `timePattern(array $pattern)`
- `timeFormat(\Agungsp\FilamentCleaveInput\Enums\TimeFormat | string $format)`

### Generic & Custom Block Options
- `blocks(array $blocks)`
- `delimiter(string $delimiter)`
- `delimiters(array $delimiters)`
- `uppercase(bool $uppercase = true)`
- `lowercase(bool $lowercase = true)`
- `numericOnly(bool $numericOnly = true)`
- `cleavePrefix(string $prefix)`
- `tailPrefix(bool $tail = true)`

### Advanced Options
- `cleaveOptions(array $options)`: Override or inject raw JS options directly into the `cleave-zen` configuration block.

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
