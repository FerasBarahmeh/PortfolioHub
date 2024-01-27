<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AddExperienceRequest;
use App\Http\Requests\Admin\DeleteExperienceRequest;
use App\Http\Requests\Admin\EditExperienceRequest;
use App\Interfaces\Repositories\Admin\DBExperiencesInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ExperiencesController extends Controller
{
    private DBExperiencesInterface $experiences;
    public function __construct(DBExperiencesInterface $experiences)
    {
        $this->experiences = $experiences;
    }

    public function store(AddExperienceRequest $request): RedirectResponse
    {
        return  $this->experiences->store($request);
    }
    public function update(EditExperienceRequest $request, $id): RedirectResponse
    {
        return  $this->experiences->update($request, $id);
    }

    public function destroy(DeleteExperienceRequest $request): RedirectResponse
    {
        return $this->experiences->destroy($request);
    }
}
