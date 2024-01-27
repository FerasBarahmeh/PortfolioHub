<?php

namespace App\Interfaces\Repositories\Admin;

use App\FileKit\Upload;
use App\Http\Requests\Admin\AddServiceRequest;
use App\Http\Requests\Admin\DeleteServiceRequest;
use App\Http\Requests\Admin\EditServiceRequest;
use App\Models\Image;
use App\Models\Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ServicesRepository implements DBServicesInterface
{
    public function store(AddServiceRequest $request): RedirectResponse
    {
        $service = Service::create(array_merge(['admin_id' => Auth::id()], $request->validated()));

        $file = $service && Upload::uploadFile('image_service', Service::class, $service->id);

        if ($file) {
            return Redirect::route('profile.index')->with('success-add-service', __('success add service'));
        }

        return Redirect::route('profile.index')->with('fail-add-service', __('fail add service'));
    }

    public function update(EditServiceRequest $request, $id): RedirectResponse
    {
        $service = Service::find($id);
        if (! $service) return Redirect::route('profile.index')->with('fail-edit-service', __('Not founded service in our records'));
        $service->update($request->validated());
        if ($service->save()) {
            return Redirect::route('profile.index')->with('success-edit-service', __('success edit service' . $service->name_service));
        }
        return Redirect::route('profile.index')->with('fail-edit-service', __('fail edit service' . $service->name_service));
    }

    public function destroy(DeleteServiceRequest $request): RedirectResponse
    {
        $id = $request->validated()['id'];

        $service = Service::find($id);

        $destroyed = $service->delete();
        if ($destroyed) {
            $rubied = Upload::rubOut(Image::find($service->image->id));
            if (!$rubied) {
                $restored = Service::withTrashed()->find($id)->restore();
                if ($restored)
                    return Redirect::route('profile.index')->with('fail-delete-service', 'fail delete service');
            }
        }
        return Redirect::route('profile.index')->with('success-delete-service', 'success delete service');
    }
}
