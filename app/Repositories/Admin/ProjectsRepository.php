<?php

namespace App\Repositories\Admin;

use App\Enums\Disks;
use App\FileKit\Upload;
use App\Http\Requests\Admin\DeleteProjectRequest;
use App\Http\Requests\Admin\StoreProjectRequest;
use App\Interfaces\Repositories\Admin\DBProjectsInterface;
use App\Models\Admin;
use App\Models\Project;
use App\Models\Skill;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;

class ProjectsRepository implements DBProjectsInterface
{
    /**
     * @inheritDoc
     */
    public function index(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $admin = Admin::find('1');
        return view('admin.projects.index', [
            'services' => $admin->services,
            'skills' => $admin->skills,
            'admin' => $admin,
        ]);
    }

    /**
     * @inheritDoc
     * @throws ValidationException
     */
    public function store(StoreProjectRequest $request): RedirectResponse
    {
        $project = Project::create(array_merge($request->validated(), ['admin_id' => auth()->id()]));
        $skills = Skill::whereIn('id', $request->input('skills'))->get();
        $project->skills()->attach($skills);

        Upload::uploadFiles('project_images', Project::class, $project->id);
        return Redirect::route('projects.index')->with('success-add-project', 'Success add project');
    }

    /**
     * @inheritDoc
     */
    public function destroy(DeleteProjectRequest $request): RedirectResponse
    {
        $id = $request->validated()['id'];
        $project = Project::find($id);
        $images = $project->images;
        if ($project->delete()) {
            foreach ($images as $image) {
                self::rubOut(Disks::Public->value, $image);
            }
        }
        return Redirect::route('projects.index')->with('success-delete-project', 'Success delete project');
    }
}
