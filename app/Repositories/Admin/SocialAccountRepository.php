<?php

namespace App\Repositories\Admin;

use App\Http\Requests\Admin\AddSocialAccountRequest;
use App\Interfaces\Repositories\Admin\DBSocialAccountInterface;
use App\Models\SocialMediaAccount;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class SocialAccountRepository implements DBSocialAccountInterface
{

    public function store(AddSocialAccountRequest $request): RedirectResponse
    {

        $domain = $request->validated()['domain_id'];

        $account = SocialMediaAccount::firstOrNew([
            'domain_id' => $domain,
        ]);

        $account->fill(array_merge($request->validated(), ['admin_id' => Auth::id()]));


        if (!$account->save())
            return Redirect::route('profile.index')->with('fail-add-account', 'fail add ' . $account->domain->domain . ' with username is ' . $account->username_account);

        return Redirect::route('profile.index')->with('success-add-account', 'add ' . $account->domain->domain . ' account with username is ' . $account->username_account . ' successfully');
    }

    public function destroy($id): RedirectResponse
    {
        $account = SocialMediaAccount::find($id);
        if (! $account)
            return Redirect::route('profile.index')->with('fail-delete-account', 'fail delete this account not sorted with our');

        if ($account->delete()) {
            return Redirect::route('profile.index')->with('success-delete-account', 'delete ' . $account->domain->domain . ' account with username is ' . $account->username_account . ' successfully');
        }
        return Redirect::route('profile.index')->with('fail-delete-account', 'fail delete this account try again later');
    }
}
