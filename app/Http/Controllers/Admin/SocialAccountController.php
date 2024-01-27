<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AddSocialAccountRequest;
use App\Interfaces\Repositories\Admin\DBSocialAccountInterface;
use Illuminate\Http\RedirectResponse;

class SocialAccountController extends Controller
{
    private DBSocialAccountInterface $account;

    public function __construct(DBSocialAccountInterface $account)
    {
        $this->account = $account;
    }

    public function store(AddSocialAccountRequest $request): RedirectResponse
    {
        return $this->account->store($request);
    }

    public function destroy($id)
    {
        return $this->account->destroy($id);
    }
}
