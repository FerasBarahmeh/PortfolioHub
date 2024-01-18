<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AddDraftRequest;
use App\Http\Requests\Admin\UpdateDraftRequest;
use App\Interfaces\Repositories\Admin\DBDraftsInterface;
use Illuminate\Http\Request;

class DraftsController extends Controller
{
    private DBDraftsInterface $drafts;
    public function __construct(DBDraftsInterface $drafts)
    {
        $this->drafts = $drafts;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->drafts->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddDraftRequest $request)
    {
        return $this->drafts->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDraftRequest $request, string $id)
    {
        return $this->drafts->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->drafts->destroy($id);
    }
}
