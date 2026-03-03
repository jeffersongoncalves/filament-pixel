## Filament Pixel

Filament plugin to manage Meta (Facebook) Pixel settings from the admin panel. Provides a settings page to configure the Pixel ID and automatically injects the tracking script into your Filament panels.

### Installation

@verbatim
<code-snippet name="Install the plugin" lang="bash">
composer require jeffersongoncalves/filament-pixel
</code-snippet>
@endverbatim

After installing, publish and run the settings migration:

@verbatim
<code-snippet name="Publish and run settings migrations" lang="bash">
php artisan vendor:publish --tag=pixel-settings-migrations
php artisan migrate
</code-snippet>
@endverbatim

### Register Plugin

@verbatim
<code-snippet name="Register in PanelProvider" lang="php">
use JeffersonGoncalves\Filament\Pixel\PixelPlugin;

public function panel(Panel $panel): Panel
{
    return $panel
        ->plugins([
            PixelPlugin::make(),
        ]);
}
</code-snippet>
@endverbatim

### Disable Settings Page

@verbatim
<code-snippet name="Disable the settings page (tracking script only)" lang="php">
PixelPlugin::make()
    ->settingsPage(false),
</code-snippet>
@endverbatim

### Features
- Automatic Meta Pixel tracking script injection via `PanelsRenderHook::HEAD_START`
- Settings Page for managing the Pixel ID from the admin panel
- Uses `spatie/laravel-settings` for persistent configuration
- Depends on `jeffersongoncalves/laravel-pixel` for core Pixel integration

### Architecture
- **Namespace**: `JeffersonGoncalves\Filament\Pixel`
- **Plugin class**: `PixelPlugin` implements `Filament\Contracts\Plugin`
- **Service Provider**: `PixelServiceProvider` extends `PackageServiceProvider`
- **Settings Page**: `Pages\ManagePixelSettings` extends `Filament\Pages\SettingsPage`
- **Settings Model**: `JeffersonGoncalves\Pixel\Settings\PixelSettings` (from laravel-pixel)

### Best Practices
- Always run the settings migration after installation
- Use `settingsPage(false)` when you only need script injection without the admin UI
- Configure the Pixel ID via the Settings Page in the admin panel
- The tracking script is injected at `HEAD_START` for all panel pages automatically
