<?php

namespace App\Repositories\Admin;

use App\Http\Requests\Admin\InfoSupplementaryUpdateRequest;
use App\Http\Requests\Admin\ProfileUpdateRequest;
use App\Interfaces\Repositories\Admin\DBSettingsInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class SettingsRepository implements DBSettingsInterface
{

    public function index(): View
    {
        return view('admin.settings.settings', [
            'admin' => Auth::user(),
        ]);
    }

    public function updateMainInfo(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('settings.index')->with('status', 'update-main-info');
    }


    public function updateSupplementaryInfo(InfoSupplementaryUpdateRequest $request): RedirectResponse
    {
        $request->user()->supplementaryInfo->fill($request->validated());
        $request->user()->supplementaryInfo->save();
        return Redirect::route('settings.index')->with('status', 'supplementary-updated');
    }

    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

}
