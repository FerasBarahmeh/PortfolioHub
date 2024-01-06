<?php

namespace App\Repositories\Admin;

use App\Http\Requests\Admin\ExtensionsInfoUpdateRequest;
use App\Interfaces\Repositories\Admin\DBExtensionsInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ExtensionsRepository implements DBExtensionsInterface
{

    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'admin' => Auth::user(),
        ]);
    }

    public function update(ExtensionsInfoUpdateRequest $request): RedirectResponse
    {
        $request->user()->supplementaryInfo->fill($request->validated());
        $request->user()->supplementaryInfo->save();
        return Redirect::route('supplementary.edit')->with('update-extension-success', 'updated information successfully');
    }
}
