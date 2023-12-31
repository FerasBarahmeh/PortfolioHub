<?php

namespace App\Http\Controllers\Guests;

use App\Http\Controllers\Controller;
use App\Interfaces\Repositories\Guest\DBWelcomeInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class WelcomeController extends Controller
{
    private DBWelcomeInterface $welcome;

    public function __construct(DBWelcomeInterface $welcome)
    {
        $this->welcome = $welcome;
    }

    public function index(): View|Factory|\Illuminate\Foundation\Application|Application
    {
        return $this->welcome->index();
    }
}
