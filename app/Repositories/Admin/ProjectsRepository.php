<?php

namespace App\Repositories\Admin;

use App\Enums\Disks;
use App\Http\Requests\Admin\DeleteProjectRequest;
use App\Http\Requests\Admin\StoreProjectRequest;
use App\Interfaces\Repositories\Admin\DBProjectsInterface;
use App\Models\Project;
use App\Models\Service;
use App\Models\Skill;
use App\Traits\Upload;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;

class ProjectsRepository implements DBProjectsInterface
{
    use Upload;
    /**
     * @inheritDoc
     */
    public function index(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('admin.projects.index', [
            'services' => Service::where('admin_id', '=', Auth::id())->get(),
            'skills' => Skill::where('admin_id', '=', Auth::id())->get(),
            'projects' => Project::all(),
        ]);
    }

    /**
     * @inheritDoc
     * @throws ValidationException
     */
    public function store(StoreProjectRequest $request): RedirectResponse
    {

        $project = Project::create($request->validated());
        $skills = Skill::whereIn('id', $request->input('skills'))->get();
        $project->skills()->attach($skills);

        self::storeMultiFile($request, 'project_images', 'admins', Disks::Public->value, $project->id, Project::class);

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
