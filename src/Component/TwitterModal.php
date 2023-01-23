<?php

namespace ArtMin96\FilamentTwitterModal\Component;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class TwitterModal extends Component
{
    public ?array $component = null;

    public function resetState(): void
    {
        $this->component = null;
    }

    public function openTwitterModal($component, array|null $componentAttributes = [], array|null $modalAttributes = []): void
    {
        $componentClass = app('livewire')->getClass($component);

        $this->component = [
            'name' => $component,
            'attributes' => $componentAttributes,
            'modalAttributes' => array_merge([
                'hasLoading' => $componentClass::hasLoading(),
            ], $modalAttributes),
        ];

        $this->emit('active-twitter-modal-component-changed');
    }

    public function getListeners(): array
    {
        return [
            'open-twitter-modal' => 'openTwitterModal',
        ];
    }

    public function render(): View
    {
        return view('filament-twitter-modal::modal');
    }
}
