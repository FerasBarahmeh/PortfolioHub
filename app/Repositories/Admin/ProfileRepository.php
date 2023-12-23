<?php

namespace App\Repositories\Admin;

use App\Http\Requests\Admin\ProfileUpdateRequest;
use App\Interfaces\Repositories\Admin\DBProfileInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileRepository implements DBProfileInterface
{

    /**
     * @inheritDoc
     */
    public function index(): View
    {
        return view('admin.profile', [
            'admin' => Auth::user(),
        ]);
    }
}
