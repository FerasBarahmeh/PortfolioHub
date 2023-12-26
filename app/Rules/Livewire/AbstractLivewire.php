<?php

namespace App\Rules\Livewire;

trait AbstractLivewire
{
    public bool $clicked = false;

    public bool $notHasRecord;
    public function toggle(): void
    {
        $this->clicked = ! $this->clicked;
    }
}
