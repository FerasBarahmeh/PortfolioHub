<?php

namespace App\Livewire;

use App\Rules\Livewire\AbstractLivewire;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class AddExperience extends Component
{
    use AbstractLivewire;
    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function render(): \Illuminate\Foundation\Application|View|Factory|Application
    {
        return view('livewire.add-experience');
    }
}
