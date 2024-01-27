<?php

namespace App\Interfaces\Repositories\Admin;

use App\Http\Requests\Admin\AddSkillRequest;
use App\Http\Requests\Admin\DeleteSkillRequest;
use App\Http\Requests\Admin\EditSkillRequest;
use Illuminate\Http\RedirectResponse;

interface DBSkillsInterface
{
    public function store(AddSkillRequest $request): RedirectResponse;
    public function update(EditSkillRequest $request, $id): RedirectResponse;
    public function destroy(DeleteSkillRequest $request): RedirectResponse;
}
