<?php

namespace App\Interfaces\Repositories\Admin;

use App\Http\Requests\Admin\AddDraftRequest;
use App\Http\Requests\Admin\UpdateDraftRequest;
use Illuminate\Http\Request;

interface DBDraftsInterface
{
    /**
     * Display a listing of the resource.
     */
    public function index();

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddDraftRequest $request);

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDraftRequest $request, string $id);

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id);
}
