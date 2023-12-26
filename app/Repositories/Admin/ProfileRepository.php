<?php

namespace App\Repositories\Admin;

use App\Enums\Disks;
use App\Http\Requests\Admin\DeleteServiceRequest;
use App\Http\Requests\Admin\ServiceRequest;
use App\Http\Requests\Admin\SocialAccountRequest;
use App\Interfaces\Repositories\Admin\DBProfileInterface;
use App\Models\DomainsSocialMedia;
use App\Models\Image;
use App\Models\Service;
use App\Models\SocialMediaAccount;
use App\Traits\Upload;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class ProfileRepository implements DBProfileInterface
{
    use Upload;

    /**
     * @inheritDoc
     */
    public function index(): View
    {
        return view('admin.profile', [
            'admin' => Auth::user(),
            'accounts' => SocialMediaAccount::where('admin_id', '=', Auth::id())->get(),
            'domains' => DomainsSocialMedia::all(),
            'services' => Service::where('admin_id', '=', Auth::id())->get(),
        ]);
    }

    public function changeSocialAccount(SocialAccountRequest $request): RedirectResponse
    {
        $domain = $request->validated()['domain_id'];

        $account = SocialMediaAccount::firstOrNew([
            'domain_id' => $domain,
        ]);

        $account->fill(array_merge($request->validated(), ['admin_id' => Auth::id()]));


        if (!$account->save())
            return Redirect::route('profile.index')->with('fail', 'add_account');

        return Redirect::route('profile.index')->with('success', 'add_account');

    }

    /**
     * @throws ValidationException
     */
    public function changeService(ServiceRequest $request): RedirectResponse
    {
        $service = Service::create(array_merge(['admin_id' => Auth::id()], $request->validated()));

        $file = $service && self::sort($request, 'image_service', 'admins', Disks::Public->value, $service->id, Service::class);

        if ($file) {
            return Redirect::route('profile.index')->with('success-service', __('success add service'));
        }

        return Redirect::route('profile.index')->with('fail-service', __('fail add service'));
    }

    public function deleteService(DeleteServiceRequest $request)
    {
        $id = $request->validated()['id'];


        $destroyed  = Service::destroy($id);
        if ($destroyed) {
            $rubied = self::rubOut(Disks::Public->value, Image::find($id));
            if (! $rubied) {
                $restored = Service::withTrashed()->find($id)->restore();
                if ($restored)
                    return Redirect::route('profile.index')->with('success-service', 'success delete service');
            }
        }
        return Redirect::route('profile.index')->with('fail-service', 'fail delete service');
    }
}
