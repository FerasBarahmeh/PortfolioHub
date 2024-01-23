<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AddPostRequest;
use App\Http\Requests\Admin\EditPostRequest;
use App\Interfaces\Repositories\Admin\DBPostsInterface;
use Illuminate\Http\Request;

class PostController extends Controller
{

    private DBPostsInterface $posts;

    public function __construct(DBPostsInterface $posts)
    {
        $this->posts = $posts;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->posts->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->posts->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddPostRequest $request)
    {
        return $this->posts->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->posts->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return $this->posts->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditPostRequest $request, string $id)
    {
        return $this->posts->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->posts->destroy($id);
    }
}
