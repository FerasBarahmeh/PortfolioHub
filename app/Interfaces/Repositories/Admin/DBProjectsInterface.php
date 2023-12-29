<?php

namespace App\Interfaces\Repositories\Admin;

use App\Http\Requests\Admin\StoreProjectRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

interface DBProjectsInterface
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View|\Illuminate\Foundation\Application|Factory|Application;
    /**
     * create new project
     */
    public function store(StoreProjectRequest $request);
}
