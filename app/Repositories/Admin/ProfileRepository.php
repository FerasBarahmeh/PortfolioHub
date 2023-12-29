<?php

namespace App\Repositories\Admin;

use App\Enums\Disks;
use App\Http\Requests\Admin\AddEducationRequest;
use App\Http\Requests\Admin\AddExperienceRequest;
use App\Http\Requests\Admin\DeleteEducationRequest;
use App\Http\Requests\Admin\DeleteExperienceRequest;
use App\Http\Requests\Admin\DeleteServiceRequest;
use App\Http\Requests\Admin\DeleteSkillRequest;
use App\Http\Requests\Admin\ServiceRequest;
use App\Http\Requests\Admin\AddSkillRequest;
use App\Http\Requests\Admin\SocialAccountRequest;
use App\Interfaces\Repositories\Admin\DBProfileInterface;
use App\Models\DomainsSocialMedia;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Image;
use App\Models\Service;
use App\Models\Skill;
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
        return view('admin.profile.profile', [
            'admin' => Auth::user(),
            'accounts' => SocialMediaAccount::where('admin_id', '=', Auth::id())->get(),
            'domains' => DomainsSocialMedia::all(),
            'services' => Service::where('admin_id', '=', Auth::id())->get(),
            'skills' => Skill::where('admin_id', '=', Auth::id())->get(),
            'experiences' => Experience::where('admin_id', '=', Auth::id())->get(),
            'educations' => Education::where('admin_id', '=', Auth::id())->get(),
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
            return Redirect::route('profile.index#services')->with('success-add-service', __('success add service'));
        }

        return Redirect::route('profile.index#services')->with('fail-add-service', __('fail add service'));
    }

    public function deleteService(DeleteServiceRequest $request): RedirectResponse
    {
        $id = $request->validated()['id'];

        $destroyed = Service::destroy($id);
        if ($destroyed) {
            $rubied = self::rubOut(Disks::Public->value, Image::find($id));
            if (!$rubied) {
                $restored = Service::withTrashed()->find($id)->restore();
                if ($restored)
                    return Redirect::route('profile.index#services')->with('fail-delete-service', 'fail delete service');
            }
        }
        return Redirect::route('profile.index#services')->with('success-delete-service', 'success delete service');
    }

    /**
     * @throws ValidationException
     */
    public function addSkill(AddSkillRequest $request): RedirectResponse
    {
        $skill = Skill::create(array_merge($request->validated(), ['admin_id' => Auth::id()]));
        $icon = $skill && self::sort($request, 'icon_skill', 'admins', Disks::Public->value, $skill->id, Skill::class);
        if ($icon)
            return Redirect::route('profile.index')->with('success-skill', __('success add skill'));
        return Redirect::route('profile.index')->with('fail-skill', __('fail add skill'));
    }

    public function deleteSkill(DeleteSkillRequest $request): RedirectResponse
    {
        $id = $request->validated()['id'];
        $destroyed = Skill::destroy($id);

        if ($destroyed) {
            $rubied = self::rubOut(Disks::Public->value, Image::find($id));
            if (!$rubied) {
                $restored = Skill::withTrashed()->find($id)->restore();
                if ($restored)
                    return Redirect::route('profile.index')->with('fail-skill', 'fail delete skill');
            }
        }

        return Redirect::route('profile.index')->with('success-skill', 'success delete skill');
    }

    public function addExperience(AddExperienceRequest $request): RedirectResponse
    {
        $experience = Experience::create(array_merge($request->validated(), ['admin_id' => Auth::id()]));
        if (! $experience) {
            return Redirect::route('profile.index')->with('fail-experience', 'fail add new experience');
        }
        return Redirect::route('profile.index')->with('success-experience', 'success add new experience');
    }

    public function deleteExperience(DeleteExperienceRequest $request): RedirectResponse
    {
        $id = $request->validated()['id'];
        $destroyed = Experience::destroy($id);
        if ($destroyed)
            return Redirect::route('profile.index')->with('success-experience', 'success delete experience');

        return Redirect::route('profile.index')->with('fail-experience', 'fail delete experience');
    }

    public function addEducation(AddEducationRequest $request): RedirectResponse
    {
        $education = Education::create(array_merge($request->validated(), ['admin_id' => Auth::id()]));
        if ($education)
            return Redirect::route('profile.index')->with('success-education', 'success delete education');
        return Redirect::route('profile.index')->with('fail-education', 'fail delete education');
    }

    public function deleteEducation(DeleteEducationRequest $request): RedirectResponse
    {
        $id = $request->validated()['id'];
        $destroyed = Education::destroy($id);
        if ($destroyed)
            return Redirect::route('profile.index')->with('success-education', 'success delete education');
        return Redirect::route('profile.index')->with('fail-education', 'fail delete education');

    }
}
