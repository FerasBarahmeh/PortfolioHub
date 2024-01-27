<?php

namespace App\Interfaces\Repositories\Admin;

use App\Http\Requests\Admin\AddServiceRequest;
use App\Http\Requests\Admin\DeleteServiceRequest;
use App\Http\Requests\Admin\EditServiceRequest;
use Illuminate\Http\RedirectResponse;

interface DBServicesInterface
{
    public function store(AddServiceRequest $request): RedirectResponse;
    public function update(EditServiceRequest $request, $id): RedirectResponse;
    public function destroy(DeleteServiceRequest $request): RedirectResponse;
}
