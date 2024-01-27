<?php

namespace App\Interfaces\Repositories\Admin;

use App\Http\Requests\Admin\AddExperienceRequest;
use App\Http\Requests\Admin\DeleteExperienceRequest;
use App\Http\Requests\Admin\EditExperienceRequest;
use Illuminate\Http\RedirectResponse;

interface DBExperiencesInterface
{
    public function store(AddExperienceRequest $request): RedirectResponse;
    public function update(EditExperienceRequest $request, $id): RedirectResponse;
    public function destroy(DeleteExperienceRequest $request): RedirectResponse;
}
