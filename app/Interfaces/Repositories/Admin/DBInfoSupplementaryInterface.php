<?php

namespace App\Interfaces\Repositories\Admin;

use App\Http\Requests\Admin\InfoSupplementaryUpdateRequest;
use App\Http\Requests\Admin\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

interface DBInfoSupplementaryInterface
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View;

    /**
     * Update the user's profile information.
     */
    public function update(InfoSupplementaryUpdateRequest $request): RedirectResponse;
}
