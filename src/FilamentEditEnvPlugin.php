<?php

namespace Joaopaulolndev\FilamentEditEnv;

use Closure;
use Filament\Contracts\Plugin;
use Filament\Panel;
use Filament\Support\Concerns\EvaluatesClosures;
use Livewire\Livewire;
use Filament\View\PanelsRenderHook;
use Illuminate\Support\Facades\Blade;
use Filament\Support\Facades\FilamentView;
use Joaopaulolndev\FilamentEditEnv\Livewire\ChangeEnvFileComponent;

class FilamentEditEnvPlugin implements Plugin
{
    use EvaluatesClosures;

    public bool | Closure | null $showButton = null;

    public function getId(): string
    {
        return 'filament-edit-env';
    }

    public function register(Panel $panel): void
    {
        //
    }

    public function boot(Panel $panel): void
    {
        Livewire::component('change-env-file', ChangeEnvFileComponent::class);

        FilamentView::registerRenderHook(
            PanelsRenderHook::GLOBAL_SEARCH_BEFORE,
            function (): string {
                if (! $this->evaluate($this->showButton)) {
                    return '';
                }

                return Blade::render('@livewire(\'change-env-file\')');
            }
        );
    }

    public static function make(): static
    {
        $plugin = app(static::class);

        $plugin->showButton(fn () => match (app()->environment()) {
            'production', 'prod' => false,
            default => true,
        });

        return $plugin;
    }

    public static function get(): static
    {
        /** @var static $plugin */
        $plugin = filament(app(static::class)->getId());

        return $plugin;
    }

    public function showButton(bool | Closure $showButton = true): static
    {
        $this->showButton = $showButton;

        return $this;
    }
}
