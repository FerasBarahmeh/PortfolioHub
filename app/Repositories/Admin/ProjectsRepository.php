<?php

namespace App\Repositories\Admin;

use App\Enums\Disks;
use App\Http\Requests\Admin\StoreProjectRequest;
use App\Interfaces\Repositories\Admin\DBProjectsInterface;
use App\Models\Project;
use App\Models\Service;
use App\Models\Skill;
use App\Traits\TraitsControllers\Projects;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ProjectsRepository implements DBProjectsInterface
{

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
     */
    public function store(StoreProjectRequest $request): RedirectResponse
    {


        $project = Project::create($request->validated());
        $skills = Skill::whereIn('id', $request->input('skills'))->get();
        $project->skills()->attach($skills);


        self::storeMultiFiles($request, 'project_images', 'admins', Disks::Public->value, $project->id, Project::class);


        return Redirect::route('projects.index')->with('success-add-project', 'Success add project');
    }
}
