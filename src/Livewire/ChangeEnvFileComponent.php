<?php

namespace Joaopaulolndev\FilamentEditEnv\Livewire;

use Livewire\Component;
use Filament\Actions\Action;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\Textarea;
use Filament\Notifications\Notification;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Actions\Concerns\InteractsWithActions;
use Joaopaulolndev\FilamentEditEnv\FilamentEditEnvPlugin;

class ChangeEnvFileComponent extends Component implements HasActions, HasForms
{
    use InteractsWithActions;
    use InteractsWithForms;

    public string $icon = '';

    public function mount()
    {
        $this->icon = FilamentEditEnvPlugin::get()->getIcon();
    }

    public function editAction()
    {
        return Action::make('env-action')
            ->icon($this->icon)
            ->iconButton()
            ->modalHeading(__('Change env file')) //@todo: need to create translation for this
            ->modalWidth('lg')
            ->form([
                //@todo: change this to a code editor
                Textarea::make('envFile')
                    ->label(__('envFile')) //@todo: need to create translation for this
                    ->required()
                    //->default(file_get_contents(base_path('.env')))
                    ->autofocus(),
            ])
            ->action(function (array $data) {
                //file_put_contents(base_path('.env'), $this->envFile);

                $this->notify(Notification::make(__('Env file saved successfully!'))); //@todo: need to create translation for this
            });
    }

    public function render()
    {
        return view('filament-edit-env::livewire.change-env-file-component');
    }
}
