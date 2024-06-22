<?php

namespace Joaopaulolndev\FilamentEditEnv\Livewire;

use Filament\Forms\Components\Textarea;
use Filament\Actions\Action;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Livewire\Component;
use Filament\Notifications\Notification;

class ChangeEnvFileComponent extends Component implements HasActions, HasForms
{
    use InteractsWithActions;
    use InteractsWithForms;

    public $envFile;

    public function editAction()
    {
        return Action::make('env-action')
            ->icon('heroicon-o-command-line')
            ->iconButton()
            ->modalHeading(__('Change env file'))
            ->modalWidth('lg')
            ->form([
                Textarea::make('envFile')
                    ->required()
                    ->default(file_get_contents(base_path('.env')))
                    ->autofocus(),
            ])
            ->action(function (array $data) {
                dd($data);
            });
    }

    public function saveEnvFileAction()
    {
        file_put_contents(base_path('.env'), $this->envFile);

        $this->notify(Notification::make(__('Env file saved successfully!')));
    }

    public function render()
    {
        return view('filament-edit-env::livewire.change-env-file-component');
    }
}
