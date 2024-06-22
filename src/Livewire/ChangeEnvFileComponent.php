<?php

namespace Joaopaulolndev\FilamentEditEnv\Livewire;

use Filament\Actions\Action;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Livewire\Component;

class ChangeEnvFileComponent extends Component implements HasActions, HasForms
{
    use InteractsWithActions;
    use InteractsWithForms;

    public function editAction()
    {
        return Action::make('env-action')
            ->icon('heroicon-o-command-line')
            ->iconButton()
            ->modalHeading(__('Change env file'))
            ->modalWidth('lg')
            ->form([
                //@todo: change this to a code editor
                Textarea::make('envFile')
                    ->required()
                    ->default(file_get_contents(base_path('.env')))
                    ->autofocus(),
            ])
            ->action(function (array $data) {
                file_put_contents(base_path('.env'), $this->envFile);

                $this->notify(Notification::make(__('Env file saved successfully!')));
            });
    }

    public function render()
    {
        return view('filament-edit-env::livewire.change-env-file-component');
    }
}
