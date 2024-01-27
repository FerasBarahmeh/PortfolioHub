<?php

namespace App\Repositories\Admin;

use App\FileKit\Upload;
use App\Http\Requests\Admin\AddSkillRequest;
use App\Http\Requests\Admin\DeleteSkillRequest;
use App\Http\Requests\Admin\EditSkillRequest;
use App\Interfaces\Repositories\Admin\DBSkillsInterface;
use App\Models\Image;
use App\Models\Skill;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class SkillsRepository implements DBSkillsInterface
{

    public function store(AddSkillRequest $request): RedirectResponse
    {
        $skill = Skill::create(array_merge($request->validated(), ['admin_id' => Auth::id()]));
        $icon = $skill && Upload::uploadFile('icon_skill', Skill::class, $skill->id);
        if ($icon)
            return Redirect::route('profile.index')->with('success-add-skill', __('success add ' . $skill->name_skill . ' skill'));
        return Redirect::route('profile.index')->with('fail-add-skill', __('fail add skill'));
    }

    public function update(EditSkillRequest $request, $id): RedirectResponse
    {
        $skill = Skill::find($id);
        if (! $skill) return Redirect::route('profile.index')->with('fail-edit-skill', __('fail, you are not add this skill yet'));
        $skill->update($request->validated());
        if ($skill->save()) Redirect::route('profile.index')->with('success-edit-skill', __('success edit ' . $skill->name_skill . ' skill'));
        return Redirect::route('profile.index')->with('fail-edit-skill', __('fail edit ' . $skill->name_skill . 'skill' ));
    }

    public function destroy(DeleteSkillRequest $request): RedirectResponse
    {
        $id = $request->validated()['id'];
        $skill = Skill::find($id);
        $name  = $skill->name_skill;
        $destroyed = $skill->delete();

        if ($destroyed) {
            $rubied = Upload::rubOut(Image::find($skill->image->id));
            if (!$rubied) {
                $restored = Skill::withTrashed()->find($id)->restore();
                if ($restored)
                    return Redirect::route('profile.index')->with('fail-delete-skill', 'fail delete skill');
            }
        }

        return Redirect::route('profile.index')->with('success-delete-skill', 'success delete skill' . $name);
    }

}
