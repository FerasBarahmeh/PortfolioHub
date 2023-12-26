<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DeleteServiceRequest;
use App\Http\Requests\Admin\DeleteSkillRequest;
use App\Http\Requests\Admin\ServiceRequest;
use App\Http\Requests\Admin\AddSkillRequest;
use App\Http\Requests\Admin\SocialAccountRequest;
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

    public function changeSocialAccount(SocialAccountRequest $request)
    {
        return $this->profileRepository->changeSocialAccount($request);
    }

    /**
     * @throws ValidationException
     */
    public function changeService(ServiceRequest $request): RedirectResponse
    {
        return $this->profileRepository->changeService($request);
    }

    public function deleteService(DeleteServiceRequest $request)
    {
        return $this->profileRepository->deleteService($request);
    }

    public function addSkill(AddSkillRequest $request)
    {
        return $this->profileRepository->addSkill($request);
    }
    public function deleteSkill(DeleteSkillRequest $request)
    {
        return $this->profileRepository->deleteSkill($request);
    }
}
