<?php

namespace App\Repositories\Admin;

use App\Interfaces\Repositories\Admin\DBPostsInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PostRepository implements DBPostsInterface
{

    /**
     * @inheritDoc
     */
    public function index(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('admin.posts.index');
    }

    /**
     * @inheritDoc
     */
    public function create(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('admin.posts.add');
    }

    /**
     * @inheritDoc
     */
    public function store(Request $request)
    {

    }

    /**
     * @inheritDoc
     */
    public function show(string $id)
    {
        // TODO: Implement show() method.
    }

    /**
     * @inheritDoc
     */
    public function edit(string $id)
    {
        // TODO: Implement edit() method.
    }

    /**
     * @inheritDoc
     */
    public function update(Request $request, string $id)
    {
        // TODO: Implement update() method.
    }

    /**
     * @inheritDoc
     */
    public function destroy(string $id)
    {
        // TODO: Implement destroy() method.
    }
}
