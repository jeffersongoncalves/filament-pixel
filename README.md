<div class="filament-hidden">

![Filament Pixel](https://raw.githubusercontent.com/jeffersongoncalves/filament-pixel/master/art/jeffersongoncalves-filament-pixel.png)

</div>

# Filament Pixel

[![Latest Version on Packagist](https://img.shields.io/packagist/v/jeffersongoncalves/filament-pixel.svg?style=flat-square)](https://packagist.org/packages/jeffersongoncalves/filament-pixel)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/jeffersongoncalves/filament-pixel/fix-php-code-style-issues.yml?branch=master&label=code%20style&style=flat-square)](https://github.com/jeffersongoncalves/filament-pixel/actions?query=workflow%3A"Fix+PHP+code+styling"+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/jeffersongoncalves/filament-pixel.svg?style=flat-square)](https://packagist.org/packages/jeffersongoncalves/filament-pixel)

Filament Pixel is a Laravel package that seamlessly integrates Meta Pixel analytics into your Blade templates. Using your Meta Pixel ID, it enables easy tracking of website visits and user interactions, providing valuable insights into your audience and website performance. With minimal setup, you can leverage Meta’s powerful analytics features directly within your application, helping you optimize your digital strategy and improve user engagement.

## Installation

You can install the package via composer:

```bash
composer require jeffersongoncalves/filament-pixel
```

## Usage

Publish config file.

```bash
php artisan vendor:publish --tag=pixel-config
```

Add head template.

```php
@include('pixel::script')
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

- [Jèfferson Gonçalves](https://github.com/jeffersongoncalves)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
