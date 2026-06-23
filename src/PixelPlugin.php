<?php

namespace JeffersonGoncalves\Filament\Pixel;

use JeffersonGoncalves\Filament\Pixel\Pages\ManagePixelSettings;
use JeffersonGoncalves\FilamentAnalyticsCore\AbstractAnalyticsPlugin;

class PixelPlugin extends AbstractAnalyticsPlugin
{
    public function getId(): string
    {
        return 'filament-pixel';
    }

    protected function getSettingsPageClass(): ?string
    {
        return ManagePixelSettings::class;
    }
}
