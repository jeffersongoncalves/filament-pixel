<div class="filament-hidden">

![Filament Pixel](https://raw.githubusercontent.com/jeffersongoncalves/filament-pixel/3.x/art/jeffersongoncalves-filament-pixel.png)

</div>

# Filament Pixel

[![Latest Version on Packagist](https://img.shields.io/packagist/v/jeffersongoncalves/filament-pixel.svg?style=flat-square)](https://packagist.org/packages/jeffersongoncalves/filament-pixel)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/jeffersongoncalves/filament-pixel/fix-php-code-style-issues.yml?branch=3.x&label=code%20style&style=flat-square)](https://github.com/jeffersongoncalves/filament-pixel/actions?query=workflow%3A"Fix+PHP+code+styling"+branch%3A3.x)
[![Total Downloads](https://img.shields.io/packagist/dt/jeffersongoncalves/filament-pixel.svg?style=flat-square)](https://packagist.org/packages/jeffersongoncalves/filament-pixel)
[![License](https://img.shields.io/packagist/l/jeffersongoncalves/filament-pixel.svg?style=flat-square)](LICENSE.md)

Filament plugin to manage Meta (Facebook) Pixel settings from the admin panel using [spatie/laravel-settings](https://github.com/spatie/laravel-settings). Provides a settings page to configure the Pixel ID and automatically injects the tracking script into your Filament panels.

## Compatibility

| Branch | Filament | Laravel | PHP |
|--------|----------|---------|-----|
| 1.x | 3.x | 10+ | 8.1+ |
| 2.x | 4.x | 11+ | 8.2+ |
| 3.x | 5.x | 11+ | 8.2+ |

## Installation

You can install the package via composer:

Install the package via Composer:

```bash
composer require jeffersongoncalves/filament-pixel
```

Publish and run the settings migration from `laravel-pixel`:

```bash
php artisan vendor:publish --tag=pixel-settings-migrations
php artisan migrate
```

## Usage

Register the plugin in your Filament panel provider:

```php
use JeffersonGoncalves\Filament\Pixel\PixelPlugin;

public function panel(Panel $panel): Panel
{
    return $panel
        ->plugins([
            PixelPlugin::make(),
        ]);
}
```

That's it! Navigate to the **Settings > Meta Pixel** page in your panel to configure the Pixel ID. The tracking script is automatically injected into all panel pages.

### Disabling the Settings Page

If you only want the automatic script injection without the settings page:

```php
PixelPlugin::make()
    ->settingsPage(false),
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

- [Jefferson Goncalves](https://github.com/jeffersongoncalves)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
