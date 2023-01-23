<?php

namespace ArtMin96\FilamentTwitterModal\Component;

use ArtMin96\FilamentTwitterModal\Contracts\TwitterModalComponent as TwitterModalContract;
use Livewire\Component;

abstract class TwitterModalComponent extends Component implements TwitterModalContract
{
    public ?array $images = [];

    public function images(array $images): void
    {
        $this->images = $images;
    }

    public function dispatch(): void
    {
        //...
    }

    public function closeModal(): void
    {
        $this->emit('close-twitter-modal');
    }

    public static function hasLoading(): bool
    {
        return false;
    }
}
