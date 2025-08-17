<?php

namespace Joaopaulolndev\FilamentEditEnv\Livewire;

use Filament\Actions\Action;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Illuminate\Contracts\View\View;
use JeffersonGoncalves\Filament\AceEditorField\Forms\Components\AceEditorInput;
use Joaopaulolndev\FilamentEditEnv\FilamentEditEnvPlugin;
use Livewire\Component;

class ChangeEnvFileComponent extends Component implements HasActions, HasForms
{
    use InteractsWithActions;
    use InteractsWithForms;

    public string $icon = '';

    public function mount(): void
    {
        $this->icon = FilamentEditEnvPlugin::get()->getIcon();
    }

    public function editAction(): Action
    {
        return Action::make('edit')
            ->icon($this->icon)
            ->iconButton()
            ->modalHeading(__('filament-edit-env::default.heading'))
            ->schema([
                AceEditorInput::make('envFile')
                    ->label('.env')
                    ->mode('php')
                    ->theme('github')
                    ->darkTheme('dracula')
                    ->required()
                    ->default(file_get_contents(base_path('.env')))
                    ->hint(__('filament-edit-env::default.hint'))
                    ->height('26rem'),
            ])
            ->action(function (array $data) {
                file_put_contents(base_path('.env'), $data['envFile']);

                Notification::make(__('filament-edit-env::default.save'));
            });
    }

    public function render(): View
    {
        return view('filament-edit-env::livewire.change-env-file-component');
    }
}
