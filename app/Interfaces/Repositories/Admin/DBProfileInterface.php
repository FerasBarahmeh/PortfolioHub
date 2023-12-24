<?php

namespace App\Interfaces\Repositories\Admin;

use App\Http\Requests\Admin\SocialAccountRequest;
use Illuminate\View\View;

interface DBProfileInterface
{
    /**
     * Display the user's profile.
     */
    public function index(): View;

    /**
     * Add Social Media Account
     */
    public function changeSocialAccount(SocialAccountRequest $request);
}
