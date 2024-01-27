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
}
