<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DeleteProjectRequest;
use App\Http\Requests\Admin\StoreProjectRequest;
use App\Interfaces\Repositories\Admin\DBProjectsInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ProjectsController extends Controller
{

    private DBProjectsInterface $projects;

    public function __construct(DBProjectsInterface $projects)
    {
        $this->projects = $projects;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View|Factory|\Illuminate\Foundation\Application|Application
    {
        return $this->projects->index();
    }

    public function store(StoreProjectRequest $request): RedirectResponse
    {
        return $this->projects->store($request);
    }

    public function destroy(DeleteProjectRequest $request): RedirectResponse
    {
        return $this->projects->destroy($request);
    }
}
