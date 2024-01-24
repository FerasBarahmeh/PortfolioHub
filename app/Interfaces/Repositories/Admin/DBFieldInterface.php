<?php

namespace App\Interfaces\Repositories\Admin;

use App\Http\Requests\Admin\AddFieldRequest;
use App\Http\Requests\Admin\EditFieldRequest;

interface DBFieldInterface
{
    /**
     * Display a listing of the resource.
     */
    public function index();

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddFieldRequest $request);

    /**
     * Update the specified resource in storage.
     */
    public function update(EditFieldRequest $request, string $id);

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id);
}
