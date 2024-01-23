<?php

namespace App\Interfaces\Repositories\Admin;

use App\Http\Requests\Admin\AddPostRequest;
use App\Http\Requests\Admin\EditPostRequest;
use Illuminate\Http\Request;

interface DBPostsInterface
{

    /**
     * Display a listing of the resource.
     */
    public function index();
    /**
     * Show the form for creating a new resource.
     */
    public function create();
    /**
     * Store a newly created resource in storage.
     */
    public function store(AddPostRequest $request);
    /**
     * Display the specified resource.
     */
    public function show(string $id);
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id);
    /**
     * Update the specified resource in storage.
     */
    public function update(EditPostRequest $request, string $id);
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id);}
