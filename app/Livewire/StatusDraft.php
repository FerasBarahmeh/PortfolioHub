<?php

namespace App\Livewire;

use App\Models\Draft;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class StatusDraft extends Component
{
    public bool $isDone;
    public string $id;

    public function changeStatus(): void
    {
        $this->isDone = !$this->isDone;

        $draft = Draft::find($this->id);
        $draft->fill([
            'is_done' => !$draft->is_done,
        ]);
        $draft->save();
    }

    public function render(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('livewire.status-draft', [
            'isDone' => $this->isDone,
        ]);
    }
}
