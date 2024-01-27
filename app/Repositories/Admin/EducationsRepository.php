<?php

namespace App\Repositories\Admin;

use App\Http\Requests\Admin\AddEducationRequest;
use App\Http\Requests\Admin\DeleteEducationRequest;
use App\Http\Requests\Admin\EditEducationRequest;
use App\Interfaces\Repositories\Admin\DBEducationsInterface;
use App\Models\Education;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class EducationsRepository implements DBEducationsInterface
{

    public function store(AddEducationRequest $request): RedirectResponse
    {
        $education = Education::create(array_merge($request->validated(), ['admin_id' => Auth::id()]));
        if ($education)
            return Redirect::route('profile.index')->with('success-add-education', 'success add education');
        return Redirect::route('profile.index')->with('fail-add-education', 'fail add education');
    }



    public function destroy(DeleteEducationRequest $request): RedirectResponse
    {
        $id = $request->validated()['id'];
        $destroyed = Education::destroy($id);
        if ($destroyed)
            return Redirect::route('profile.index')->with('success-delete-education', 'success delete education');
        return Redirect::route('profile.index')->with('fail-delete-education', 'fail delete education');
    }

    public function update(EditEducationRequest $request, $id): RedirectResponse
    {
        $education = Education::find($id);
        if (! $education) return Redirect::route('profile.index')->with('fail-edit-education', 'edit not success ');

        $education->update($request->validated());
        if ($education->save())
            return Redirect::route('profile.index')->with('success-edit-education', 'success edit education');
        return Redirect::route('profile.index')->with('success-fail-education', 'fail edit education');
    }
}
