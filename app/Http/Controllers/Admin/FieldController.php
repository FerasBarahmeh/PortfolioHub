<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AddFieldRequest;
use App\Http\Requests\Admin\EditFieldRequest;
use App\Interfaces\Repositories\Admin\DBFieldInterface;
use Illuminate\Http\Request;

class FieldController extends Controller
{
    private DBFieldInterface $field;

    public function __construct(DBFieldInterface $field)
    {
        $this->field  = $field;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->field->index();
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(AddFieldRequest $request)
    {
        return $this->field->store($request);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(EditFieldRequest $request, string $id)
    {
        return $this->field->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->field->destroy($id);
    }
}
