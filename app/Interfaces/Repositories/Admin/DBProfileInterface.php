<?php

namespace App\Interfaces\Repositories\Admin;

use App\Http\Requests\Admin\AddEducationRequest;
use App\Http\Requests\Admin\AddExperienceRequest;
use App\Http\Requests\Admin\DeleteEducationRequest;
use App\Http\Requests\Admin\DeleteExperienceRequest;
use App\Http\Requests\Admin\DeleteServiceRequest;
use App\Http\Requests\Admin\AddSkillRequest;
use App\Http\Requests\Admin\DeleteSkillRequest;
use App\Http\Requests\Admin\AddSocialAccountRequest;
use Illuminate\View\View;

interface DBProfileInterface
{
    /**
     * Display the user's profile.
     */
    public function index(): View;
}
