<?php

namespace JeffersonGoncalves\Filament\Pixel\Pages;

use Filament\Forms\Components\TextInput;
use Filament\Pages\SettingsPage;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use JeffersonGoncalves\Pixel\Settings\PixelSettings;

class ManagePixelSettings extends SettingsPage
{
    protected static string $settings = PixelSettings::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-chart-bar';

    public static function getNavigationGroup(): string
    {
        return __('filament-pixel::pages.navigation_group');
    }

    public static function getNavigationLabel(): string
    {
        return __('filament-pixel::pages.navigation_label');
    }

    public function getTitle(): string
    {
        return __('filament-pixel::pages.title');
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->columns(null)
            ->schema([
                Section::make(__('filament-pixel::pages.section_title'))
                    ->description(__('filament-pixel::pages.section_description'))
                    ->schema([
                        TextInput::make('pixel_id')
                            ->label(__('filament-pixel::pages.pixel_id_label'))
                            ->placeholder('123456789012345')
                            ->maxLength(20)
                            ->helperText(__('filament-pixel::pages.pixel_id_helper')),
                    ]),
            ]);
    }
}
