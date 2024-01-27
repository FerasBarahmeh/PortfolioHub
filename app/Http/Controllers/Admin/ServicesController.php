<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AddServiceRequest;
use App\Http\Requests\Admin\DeleteServiceRequest;
use App\Http\Requests\Admin\EditServiceRequest;
use App\Interfaces\Repositories\Admin\DBServicesInterface;
use Illuminate\Http\RedirectResponse;

class ServicesController extends Controller
{
    private DBServicesInterface $services;

    public function __construct(DBServicesInterface $services)
    {
        $this->services = $services;
    }

    public function store(AddServiceRequest $request): RedirectResponse
    {
       return  $this->services->store($request);
    }

    public function update(EditServiceRequest $request, $id): RedirectResponse
    {
        return $this->services->update($request, $id);
    }

    public function destroy(DeleteServiceRequest $request): RedirectResponse
    {
        return  $this->services->destroy($request);
    }
}
