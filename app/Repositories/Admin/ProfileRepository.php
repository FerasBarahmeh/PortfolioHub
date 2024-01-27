<?php

namespace App\Repositories\Admin;

use App\Http\Requests\Admin\AddEducationRequest;
use App\Http\Requests\Admin\AddExperienceRequest;
use App\Http\Requests\Admin\AddSkillRequest;
use App\Http\Requests\Admin\DeleteEducationRequest;
use App\Http\Requests\Admin\DeleteExperienceRequest;
use App\Http\Requests\Admin\DeleteServiceRequest;
use App\Http\Requests\Admin\DeleteSkillRequest;
use App\Http\Requests\Admin\AddServiceRequest;
use App\Http\Requests\Admin\AddSocialAccountRequest;
use App\Interfaces\Repositories\Admin\DBProfileInterface;
use App\Models\DomainsSocialMedia;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Image;
use App\Models\Service;
use App\Models\Skill;
use App\Models\SocialMediaAccount;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use App\FileKit\Upload;

class ProfileRepository implements DBProfileInterface
{


    /**
     * @inheritDoc
     */
    public function index(): View
    {
        $admin = Auth::user();
        return view('admin.profile.profile', [
            'admin' => $admin,
            'accounts' => SocialMediaAccount::where('admin_id', '=', Auth::id())->get(),
            'domains' => DomainsSocialMedia::all(),
            'services' => $admin->services,
            'skills' => $admin->skills,
            'experiences' => $admin->experiences,
            'educations' => $admin->educations,
        ]);
    }

    public function addExperience(AddExperienceRequest $request): RedirectResponse
    {
        $experience = Experience::create(array_merge($request->validated(), ['admin_id' => Auth::id()]));
        if (!$experience) {
            return Redirect::route('profile.index')->with('fail-add-experience', 'fail add new ' . $request->validated()['career_title']);
        }
        return Redirect::route('profile.index')->with('success-add-experience', 'success add experience as a ' . $experience->career_title);
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
