<?php

namespace App\Interfaces\Repositories\Admin;

use App\Http\Requests\Admin\DeleteProjectRequest;
use App\Http\Requests\Admin\StoreProjectRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

interface DBProjectsInterface
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View|\Illuminate\Foundation\Application|Factory|Application;
    /**
     * create new project
     */
    public function store(StoreProjectRequest $request): RedirectResponse;

    /**
     * Delete project
     */
    public function destroy(DeleteProjectRequest $request):RedirectResponse;
}
