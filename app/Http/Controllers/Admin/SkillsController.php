<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AddSkillRequest;
use App\Http\Requests\Admin\DeleteSkillRequest;
use App\Http\Requests\Admin\EditSkillRequest;
use App\Interfaces\Repositories\Admin\DBSkillsInterface;
use Illuminate\Http\RedirectResponse;

class SkillsController extends Controller
{
    private DBSkillsInterface $skills;
    public function __construct(DBSkillsInterface $skills)
    {
        $this->skills = $skills;
    }

    public function store(AddSkillRequest $request): RedirectResponse
    {
        return $this->skills->store($request);
    }

    public function update(EditSkillRequest $request, $id)
    {
        return $this->skills->update($request, $id);
    }

    public function destroy(DeleteSkillRequest $request): RedirectResponse
    {
        return $this->skills->destroy($request);
    }
}
