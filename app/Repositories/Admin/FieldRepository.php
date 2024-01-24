<?php

namespace App\Repositories\Admin;

use App\Http\Requests\Admin\AddFieldRequest;
use App\Http\Requests\Admin\EditFieldRequest;
use App\Interfaces\Repositories\Admin\DBFieldInterface;
use App\Models\Field;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class FieldRepository implements DBFieldInterface
{

    /**
     * @inheritDoc
     */
    public function index(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('admin.fields.index', [
            'fields' => Field::all(),
        ]);
    }

    /**
     * @inheritDoc
     */
    public function store(AddFieldRequest $request): RedirectResponse
    {
        $field = Field::create($request->all());
        if (!$field) {
            return Redirect::route('fields.index')->with('fail-add-field', 'fail add field try again');
        }
        return Redirect::route('fields.index')->with('success-add-field', ' successfully add filed has name ' . $field->name);
    }

    /**
     * @inheritDoc
     */
    public function update(EditFieldRequest $request, string $id): RedirectResponse
    {
        $field = Field::find($id);
        if (! $field)     return Redirect::route('fields.index')->with('fail-edit-field', 'not found this field in out data');
        $field->update($request->all());
        if($field->save()) {
            return Redirect::route('fields.index')->with('success-edit-field', ' successfully edit filed has name ' . $field->name);
        }
        return Redirect::route('fields.index')->with('fail-edit-field', ' fail edit filed has name ' . $field->name. ' try again later');
    }

    /**
     * @inheritDoc
     */
    public function destroy(string $id)
    {
        $field = Field::find($id);
        if (! $field)     return Redirect::route('fields.index')->with('fail-delete-field', 'not found this field in out data');

        if ($field->delete()) {
            return Redirect::route('fields.index')->with('success-delete-field', ' successfully delete filed has name ' . $field->name);
        }
        return Redirect::route('fields.index')->with('fail-delete-field', ' fail delete filed has name ' . $field->name. ' try again later');
    }
}
