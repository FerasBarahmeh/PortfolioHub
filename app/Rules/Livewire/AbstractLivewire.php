<?php

namespace App\Rules\Livewire;

trait AbstractLivewire
{
    public bool $clicked = false;

    public function toggle(): void
    {
        $this->clicked = ! $this->clicked;
    }
}
