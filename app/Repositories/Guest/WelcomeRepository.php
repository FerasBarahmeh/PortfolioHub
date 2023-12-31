<?php

namespace App\Repositories\Guest;

use App\Interfaces\Repositories\Guest\DBWelcomeInterface;
use App\Models\Admin;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class WelcomeRepository implements DBWelcomeInterface
{
    public function index(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('welcome', [
            'admin' => Admin::first(),
        ]);
    }
}
