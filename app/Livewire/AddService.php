<?php

namespace App\Livewire;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class AddService extends Component
{
    public bool $clicked = false;

    public function toggle(): void
    {
        $this->clicked = ! $this->clicked;
    }

    public function render(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('livewire.add-service');
    }
}
