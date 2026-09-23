# Changelog

All notable changes to this project will be documented in this file.

## 1.4.0 - 2026-09-23

### What's new

- **Translations:** 17 new locales (ar, az, de, es, fa, fr, hi, it, ja, nl, pl, pt, ru, tr, uk, uz, zh_CN). (#34)

Thanks to @Elvin-Qulizade (Elvin Qulizada) for the i18n initiative behind these translations — first contributed in jeffersongoncalves/filament-scanner-guard#2 and now rolled out across the Filament plugins. He is credited as co-author.

### What's Changed

* docs: add Buy Me a Coffee sponsor link by @jeffersongoncalves in https://github.com/jeffersongoncalves/filament-pixel/pull/17
* chore: add Buy Me a Coffee to FUNDING.yml by @jeffersongoncalves in https://github.com/jeffersongoncalves/filament-pixel/pull/20
* ci: standardize update-changelog workflow (1.x) by @jeffersongoncalves in https://github.com/jeffersongoncalves/filament-pixel/pull/22
* build(deps): bump the actions-deps group with 4 updates by @dependabot[bot] in https://github.com/jeffersongoncalves/filament-pixel/pull/29
* build(deps): update jeffersongoncalves/laravel-pixel requirement from ^2.0 to ^3.0 in the composer-deps group by @dependabot[bot] in https://github.com/jeffersongoncalves/filament-pixel/pull/33
* feat(i18n): add translations (1.x) by @jeffersongoncalves in https://github.com/jeffersongoncalves/filament-pixel/pull/34

**Full Changelog**: https://github.com/jeffersongoncalves/filament-pixel/compare/1.3.0...1.4.0

## 1.3.0 - 2026-06-23

Refactor onto filament-analytics-core base classes; drop redundant dependencies (provided transitively via the cores).

## 1.2.0 - 2026-02-22

**Full Changelog**: https://github.com/jeffersongoncalves/filament-pixel/compare/1.1.0...1.2.0

## 1.1.0 - 2026-02-22

### Added

- Plugin class (`FilamentPixelPlugin`) with Filament Panel integration
- Settings page (`ManagePixelSettings`) to manage Meta Pixel ID from admin panel
- Translations (en, pt_BR) for navigation labels and form fields
- `settingsPage()` toggle method to enable/disable the settings page

### Changed

- Updated `laravel-pixel` dependency to `^2.0` (uses `spatie/laravel-settings` instead of config/env)
- Added `filament/spatie-laravel-settings-plugin` `^3.0` dependency
- Rewrote README with new installation and usage instructions
- Removed references to config file publishing

## 1.0.0 - 2025-05-01

**Full Changelog**: https://github.com/jeffersongoncalves/filament-pixel/commits/1.0.0
