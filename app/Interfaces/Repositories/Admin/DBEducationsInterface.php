<?php

namespace App\Interfaces\Repositories\Admin;

use App\Http\Requests\Admin\AddEducationRequest;
use App\Http\Requests\Admin\DeleteEducationRequest;
use App\Http\Requests\Admin\EditEducationRequest;
use Illuminate\Http\RedirectResponse;

interface DBEducationsInterface
{
    public function store(AddEducationRequest $request): RedirectResponse;
    public function update(EditEducationRequest $request, $id): RedirectResponse;

    public function destroy(DeleteEducationRequest $request): RedirectResponse;

}
