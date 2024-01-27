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
            'domains' => DomainsSocialMedia::all(),
        ]);
    }

}
