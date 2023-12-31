<?php

namespace App\Interfaces\Repositories\Guest;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

interface DBWelcomeInterface
{
    public function index(): View|\Illuminate\Foundation\Application|Factory|Application;
}
