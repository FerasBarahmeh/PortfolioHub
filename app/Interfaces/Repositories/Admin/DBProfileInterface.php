<?php

namespace App\Interfaces\Repositories\Admin;

use App\Http\Requests\Admin\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

interface DBProfileInterface
{
    /**
     * Display the user's profile.
     */
    public function index(): View;

}
