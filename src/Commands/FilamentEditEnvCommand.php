<?php

namespace Joaopaulolndev\FilamentEditEnv\Commands;

use Illuminate\Console\Command;

class FilamentEditEnvCommand extends Command
{
    public $signature = 'filament-edit-env';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
