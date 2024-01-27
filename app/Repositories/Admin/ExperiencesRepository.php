<?php

namespace App\Repositories\Admin;

use App\Http\Requests\Admin\AddExperienceRequest;
use App\Http\Requests\Admin\DeleteExperienceRequest;
use App\Http\Requests\Admin\EditExperienceRequest;
use App\Interfaces\Repositories\Admin\DBExperiencesInterface;
use App\Models\Experience;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ExperiencesRepository implements DBExperiencesInterface
{

    public function store(AddExperienceRequest $request): RedirectResponse
    {
        $experience = Experience::create(array_merge($request->validated(), ['admin_id' => Auth::id()]));
        if (!$experience) {
            return Redirect::route('profile.index')->with('fail-add-experience', 'fail add new ' . $request->validated()['career_title']);
        }
        return Redirect::route('profile.index')->with('success-add-experience', 'success add experience as a ' . $experience->career_title);
    }

    public function destroy(DeleteExperienceRequest $request): RedirectResponse
    {
        $id = $request->validated()['id'];
        $destroyed = Experience::destroy($id);
        if ($destroyed)
            return Redirect::route('profile.index')->with('success-delete-experience', 'success delete experience');

        return Redirect::route('profile.index')->with('fail-delete-experience', 'fail delete experience');
    }

    public function update(EditExperienceRequest $request, $id): RedirectResponse
    {
        $experience = Experience::find($id);
        if (! $experience)    return Redirect::route('profile.index')->with('fail-edit-experience', 'not found experience from our record');

        $experience->update($request->validated());
        if ($experience->save()) {
            return Redirect::route('profile.index')->with('success-edit-experience', 'success edit for experience'  );
        }
        return Redirect::route('profile.index')->with('fail-edit-experience', 'fail edit experience');
    }
}
