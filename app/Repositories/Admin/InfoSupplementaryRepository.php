<?php

namespace App\Repositories\Admin;

use App\Http\Requests\Admin\InfoSupplementaryUpdateRequest;
use App\Interfaces\Repositories\Admin\DBInfoSupplementaryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class InfoSupplementaryRepository implements DBInfoSupplementaryInterface
{

    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'admin' => Auth::user(),
        ]);
    }

    public function update(InfoSupplementaryUpdateRequest $request): RedirectResponse
    {
        $request->user()->supplementaryInfo->fill($request->validated());
        $request->user()->supplementaryInfo->save();
        return Redirect::route('supplementary.edit')->with('status', 'supplementary');
    }
}
