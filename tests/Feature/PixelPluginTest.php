<?php

use Filament\Facades\Filament;
use Filament\Support\Facades\FilamentView;
use Filament\View\PanelsRenderHook;
use Illuminate\Foundation\Auth\User;
use JeffersonGoncalves\Filament\Pixel\Pages\ManagePixelSettings;
use JeffersonGoncalves\Filament\Pixel\PixelPlugin;
use JeffersonGoncalves\Pixel\Settings\PixelSettings;
use Livewire\Livewire;

beforeEach(function () {
    Filament::setCurrentPanel(Filament::getPanel('test'));
    $this->actingAs((new User)->forceFill(['id' => 1, 'name' => 'Admin', 'email' => 'admin@example.com']));
});

it('registers the settings page on the panel', function () {
    expect(Filament::getPanel('test')->getPages())->toContain(ManagePixelSettings::class)
        ->and(PixelPlugin::make()->getId())->toBe('filament-pixel');
});

it('ships translated labels', function () {
    expect(ManagePixelSettings::getNavigationLabel())->not->toContain('::')
        ->and((new ManagePixelSettings)->getTitle())->not->toContain('::');
});

it('saves the settings from the page', function () {
    Livewire::test(ManagePixelSettings::class)
        ->fillForm(['pixel_id' => '123456789'])
        ->call('save')
        ->assertHasNoFormErrors();

    $settings = app(PixelSettings::class)->refresh();
    expect($settings->pixel_id)->toBe('123456789');
});

it('injects the script into the panel once configured', function () {
    $settings = app(PixelSettings::class);
    $settings->pixel_id = '123456789';
    $settings->save();

    $html = (string) FilamentView::renderHook(PanelsRenderHook::HEAD_START)
        .(string) FilamentView::renderHook(PanelsRenderHook::HEAD_END)
        .(string) FilamentView::renderHook(PanelsRenderHook::BODY_START)
        .(string) FilamentView::renderHook(PanelsRenderHook::BODY_END);

    expect($html)->toContain('fbevents.js');
});
