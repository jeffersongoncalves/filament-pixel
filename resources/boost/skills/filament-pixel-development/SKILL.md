---
name: filament-pixel-development
description: Build and work with Filament Pixel plugin features, including Meta (Facebook) Pixel tracking script injection, settings page management, and Pixel ID configuration.
---

# Filament Pixel Development

## When to use this skill

Use this skill when:
- Adding Meta (Facebook) Pixel tracking to a Filament panel
- Configuring the Pixel ID via the admin settings page
- Disabling the settings page for script-only injection
- Customizing the Pixel settings page
- Extending the plugin with additional tracking features
- Troubleshooting Pixel tracking or settings issues

## Requirements

- PHP 8.2+
- Laravel 11.0+
- Filament 5.0
- `jeffersongoncalves/laravel-pixel` ^2.0
- `filament/spatie-laravel-settings-plugin` ^5.0

## Installation

```bash
composer require jeffersongoncalves/filament-pixel
```

### Publish settings migrations

```bash
php artisan vendor:publish --tag=pixel-settings-migrations
php artisan migrate
```

## Configuration

### Register the Plugin

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

This automatically:
- Injects the Meta Pixel tracking script into the panel `<head>` via `PanelsRenderHook::HEAD_START`
- Registers the `ManagePixelSettings` settings page

### Disable Settings Page

```php
PixelPlugin::make()
    ->settingsPage(false),
```

## Architecture

### Namespace

`JeffersonGoncalves\Filament\Pixel`

### Key Classes

#### PixelPlugin

```php
namespace JeffersonGoncalves\Filament\Pixel;

use Filament\Contracts\Plugin;
use Filament\Panel;

class PixelPlugin implements Plugin
{
    protected bool $hasSettingsPage = true;

    public static function make(): static;
    public static function get(): static;
    public function getId(): string;              // returns 'filament-pixel'
    public function register(Panel $panel): void;
    public function boot(Panel $panel): void;
    public function settingsPage(bool $condition = true): static;
}
```

#### PixelServiceProvider

```php
namespace JeffersonGoncalves\Filament\Pixel;

use Spatie\LaravelPackageTools\PackageServiceProvider;

class PixelServiceProvider extends PackageServiceProvider
{
    // Registers the render hook for script injection
    // FilamentView::registerRenderHook(PanelsRenderHook::HEAD_START, fn (): View => view('pixel::script'));
}
```

#### ManagePixelSettings

```php
namespace JeffersonGoncalves\Filament\Pixel\Pages;

use Filament\Pages\SettingsPage;
use JeffersonGoncalves\Pixel\Settings\PixelSettings;

class ManagePixelSettings extends SettingsPage
{
    protected static string $settings = PixelSettings::class;
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-chart-bar';
}
```

### Settings Page Fields

The settings page provides a single section with one field:

- **pixel_id** -- `TextInput`, placeholder `123456789012345`, max length 20

### Dependencies

- `jeffersongoncalves/laravel-pixel` -- Core Meta Pixel integration providing `PixelSettings` model and the tracking script Blade view (`pixel::script`)
- `filament/spatie-laravel-settings-plugin` -- Filament integration for `spatie/laravel-settings`

## Extending the Plugin

### Custom Settings Page

To override the default settings page:

```php
namespace App\Filament\Pages;

use JeffersonGoncalves\Filament\Pixel\Pages\ManagePixelSettings as BaseSettings;

class ManagePixelSettings extends BaseSettings
{
    // Override form() to add custom fields or sections
    public function form(Schema $schema): Schema
    {
        return $schema
            ->columns(null)
            ->schema([
                // Your custom schema here
            ]);
    }
}
```

Then disable the default and register your custom page in the panel provider.

### Adding Custom Pixel Events

The plugin handles base Pixel script injection. For custom events, add JavaScript to your Blade views:

```html
<script>
    fbq('track', 'Purchase', {value: 25.00, currency: 'USD'});
</script>
```

## Troubleshooting

### Tracking script not loading
**Cause**: The `PixelServiceProvider` is not auto-discovered or no Pixel ID is configured.
**Solution**: Ensure the package is installed and the service provider is registered. Set the Pixel ID via the Settings page.

### Settings page not appearing
**Cause**: `settingsPage(false)` was called, or the settings migration was not run.
**Solution**: Verify `settingsPage()` is not set to `false`. Run `php artisan vendor:publish --tag=pixel-settings-migrations && php artisan migrate`.

### Pixel ID not saving
**Cause**: The `settings` table does not exist or the pixel settings migration was not run.
**Solution**: Ensure the pixel-settings migration has been published and run.

### Pixel not firing on page loads
**Cause**: The Pixel ID is empty or invalid in settings.
**Solution**: Navigate to Settings > Meta Pixel and enter a valid 15-digit Meta Pixel ID.
