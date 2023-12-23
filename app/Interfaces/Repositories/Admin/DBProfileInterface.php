<?php

namespace App\Interfaces\Repositories\Admin;

use App\Http\Requests\Admin\ProfileUpdateRequest;
use App\Http\Requests\Admin\SocialMediaAccountRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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
    public function addSocialMediaAccount(SocialMediaAccountRequest $request);
}
