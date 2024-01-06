<?php

namespace App\Repositories\Admin;

use App\Http\Requests\Admin\ExtensionsInfoUpdateRequest;
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

        return Redirect::route('settings.index')->with('update-main-info-success', 'updated successfully');
    }


    public function updateSupplementaryInfo(ExtensionsInfoUpdateRequest $request): RedirectResponse
    {
        $request->user()->extensions->fill($request->validated());
        $request->user()->extensions->save();
        return Redirect::route('settings.index')->with('extensions-info-updated', 'supplementary information updated');
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
