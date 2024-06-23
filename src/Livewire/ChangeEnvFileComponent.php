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

    public string $icon = '';

    public function mount()
    {
        $this->icon = \Joaopaulolndev\FilamentEditEnv\FilamentEditEnvPlugin::get()->getIcon();
    }

    public function editAction()
    {
        return Action::make('edit')
            ->icon($this->icon)
            ->iconButton()
            ->modalHeading(__('filament-edit-env::default.heading'))
            ->form([
                //@todo: change this to a code editor
                Textarea::make('envFile')
                    ->label('.env')
                    ->required()
                    ->default(file_get_contents(base_path('.env')))
                    ->autofocus()
                    ->rows(20)
                    ->hint(__('filament-edit-env::default.hint')),
            ])
            ->action(function (array $data) {
                file_put_contents(base_path('.env'), $data['envFile']);

                Notification::make(__('filament-edit-env::default.save'));
            });
    }

    public function render()
    {
        return view('filament-edit-env::livewire.change-env-file-component');
    }
}
