<?php

namespace App\Livewire;

use App\Rules\Livewire\AbstractLivewire;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class AddEducation extends Component
{
    use AbstractLivewire;

    public function render(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('livewire.add-education');
    }
}
