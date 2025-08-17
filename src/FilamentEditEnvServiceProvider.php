<?php

namespace Joaopaulolndev\FilamentEditEnv;

use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilamentEditEnvServiceProvider extends PackageServiceProvider
{
    public static string $name = 'filament-edit-env';

    public static string $viewNamespace = 'filament-edit-env';

    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package->name(static::$name)
            ->hasInstallCommand(function (InstallCommand $command) {
                $command->askToStarRepoOnGitHub('joaopaulolndev/filament-edit-env');
            });

        if (file_exists($package->basePath('/../resources/lang'))) {
            $package->hasTranslations();
        }

        if (file_exists($package->basePath('/../resources/views'))) {
            $package->hasViews(static::$viewNamespace);
        }
    }
}
