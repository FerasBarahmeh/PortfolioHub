<?php

namespace App\Repositories\Admin;

use App\Http\Requests\Admin\SocialAccountRequest;
use App\Interfaces\Repositories\Admin\DBProfileInterface;
use App\Models\DomainsSocialMedia;
use App\Models\SocialMediaAccount;
use Illuminate\Http\RedirectResponse;
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
            'accounts' => SocialMediaAccount::where('admin_id', '=', Auth::id())->get(),
            'domains' => DomainsSocialMedia::all(),
        ]);
    }

    public function changeSocialAccount(SocialAccountRequest $request): RedirectResponse
    {
        $domain = $request->validated()['domain_id'];

        $account = SocialMediaAccount::firstOrNew([
            'domain_id' => $domain,
        ]);

        $account->fill(array_merge($request->validated(), ['admin_id' => Auth::id()]));


        if (! $account->save())
            return Redirect::route('profile.index')->with('fail', 'add_account');

        return Redirect::route('profile.index')->with('success', 'add_account');

    }
}
