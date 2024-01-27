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


    /**
     * for delete request
     */
    public function deleteService(DeleteServiceRequest $request);

    /**
     * Add skill
     */
    public function addSkill(AddSkillRequest $request);

    /**
     * Remove skill
     */
    public function deleteSkill(DeleteSkillRequest $request);

    /**
     * add experience to admin
     */
    public function addExperience(AddExperienceRequest $request);

    /**
     * delete experience
     */
    public function deleteExperience(DeleteExperienceRequest $request);
    /**
     * add education
     */
    public function addEducation(AddEducationRequest $request);

    /**
     * Delete education
     */
    public function deleteEducation(DeleteEducationRequest $request);
}
