<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AddEducationRequest;
use App\Http\Requests\Admin\AddExperienceRequest;
use App\Http\Requests\Admin\DeleteEducationRequest;
use App\Http\Requests\Admin\DeleteExperienceRequest;
use App\Http\Requests\Admin\DeleteServiceRequest;
use App\Http\Requests\Admin\DeleteSkillRequest;
use App\Http\Requests\Admin\AddServiceRequest;
use App\Http\Requests\Admin\AddSkillRequest;
use App\Http\Requests\Admin\AddSocialAccountRequest;
use App\Interfaces\Repositories\Admin\DBProfileInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class ProfileController extends Controller
{
    private DBProfileInterface $profileRepository;

    public function __construct(DBProfileInterface $profileRepository)
    {
        $this->profileRepository = $profileRepository;
    }

    public function index(): View
    {
        return $this->profileRepository->index();
    }


    /**
     * @throws ValidationException
     */
    public function changeService(AddServiceRequest $request): RedirectResponse
    {
        return $this->profileRepository->changeService($request);
    }

    public function deleteService(DeleteServiceRequest $request): RedirectResponse
    {
        return $this->profileRepository->deleteService($request);
    }

    public function addSkill(AddSkillRequest $request): RedirectResponse
    {
        return $this->profileRepository->addSkill($request);
    }
    public function deleteSkill(DeleteSkillRequest $request): RedirectResponse
    {
        return $this->profileRepository->deleteSkill($request);
    }
    public function addExperience(AddExperienceRequest $request): RedirectResponse
    {
        return $this->profileRepository->addExperience($request);
    }
    public function deleteExperience(DeleteExperienceRequest $request): RedirectResponse
    {
        return $this->profileRepository->deleteExperience($request);
    }

    public function addEducation(AddEducationRequest $request)
    {
        return $this->profileRepository->addEducation($request);
    }

    public function deleteEducation(DeleteEducationRequest $request)
    {
        return $this->profileRepository->deleteEducation($request);
    }
}
