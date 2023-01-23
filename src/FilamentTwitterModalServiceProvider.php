<?php

namespace ArtMin96\FilamentTwitterModal;

use ArtMin96\FilamentTwitterModal\Component\TwitterModal;
use Filament\Facades\Filament;
use Filament\PluginServiceProvider;
use Illuminate\Support\Facades\Blade;
use Livewire;
use Spatie\LaravelPackageTools\Package;

class FilamentTwitterModalServiceProvider extends PluginServiceProvider
{
    public static string $name = 'filament-twitter-modal';

    protected array $styles = [
        'plugin-filament-twitter-modal' => __DIR__.'/../resources/dist/filament-twitter-modal.css',
    ];

     protected array $beforeCoreScripts = [
         'plugin-filament-twitter-modal' => __DIR__ . '/../resources/dist/filament-twitter-modal.js',
     ];

    public function configurePackage(Package $package): void
    {
        $package->name(static::$name)
            ->hasConfigFile()
            ->hasViews();
    }

    public function packageBooted(): void
    {
        parent::packageBooted();

        Livewire::component('filament-twitter-modal', TwitterModal::class);

        Filament::registerRenderHook(
            'body.end',
            fn (): string => Blade::render('@livewire(\'filament-twitter-modal\')'),
        );
    }
}
