<?php

namespace App\Interfaces\Repositories\Admin;
use App\Http\Requests\Admin\InfoSupplementaryUpdateRequest;
use App\Http\Requests\Admin\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

interface DBSettingsInterface
{
    /**
     * Settings page
     */
    public function index(): View;

    /**
     * Update the user's profile information.
     */
    public function updateMainInfo(ProfileUpdateRequest $request): RedirectResponse;
    public function updateSupplementaryInfo(InfoSupplementaryUpdateRequest $request): RedirectResponse;

    /**
     * Remove admin account
     */
    public function destroy(Request $request): RedirectResponse;


}
