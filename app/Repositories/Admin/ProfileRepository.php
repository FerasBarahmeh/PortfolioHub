<?php

namespace App\Repositories\Admin;

use App\Interfaces\Repositories\Admin\DBProfileInterface;
use App\Models\DomainsSocialMedia;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;


class ProfileRepository implements DBProfileInterface
{


    /**
     * @inheritDoc
     */
    public function index(): View
    {
        $admin = Auth::user();
        return view('admin.profile.profile', [
            'admin' => $admin,
            'domains' => DomainsSocialMedia::all(),
        ]);
    }

}
