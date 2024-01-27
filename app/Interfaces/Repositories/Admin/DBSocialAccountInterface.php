<?php

namespace App\Interfaces\Repositories\Admin;

use App\Http\Requests\Admin\AddSocialAccountRequest;
use Illuminate\Http\RedirectResponse;

interface DBSocialAccountInterface
{
    public function store(AddSocialAccountRequest $request): RedirectResponse;
    public function destroy($id);
}
