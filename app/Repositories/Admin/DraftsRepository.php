<?php

namespace App\Repositories\Admin;

use App\Http\Requests\Admin\AddDraftRequest;
use App\Http\Requests\Admin\UpdateDraftRequest;
use App\Interfaces\Repositories\Admin\DBDraftsInterface;
use App\Models\Draft;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class DraftsRepository implements DBDraftsInterface
{

    /**
     * @inheritDoc
     */
    public function index(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $admin = Auth::user();
        return view('admin.drafts.index', [
            'drafts' => $admin->drafts,
        ]);
    }


    /**
     * @inheritDoc
     */
    public function store(AddDraftRequest $request): RedirectResponse
    {
        $values = array_merge($request->validated(), ['admin_id' => Auth::id()]);
        $draft = Draft::create($values);

        return  redirect(route('drafts.index'))->with(
           $draft ? 'success-add-draft' : 'fail-add-draft',
            $draft ? 'Success add draft has title ' . $request->input('title') : 'Fail add draft try later plz'
        );
    }


    /**
     * @inheritDoc
     */
    public function update(UpdateDraftRequest $request, string $id): RedirectResponse
    {
        $draft = Draft::updateOrCreate(['id' => $id], $request->validated());
        return redirect()->route('drafts.index')->with(
            $draft ? 'success-edit-draft' : 'fail-edit-draft',
            $draft ? 'Success edit draft has title ' . $request->input('title') : 'Failed to edit draft, try again later'
        );
    }

    /**
     * @inheritDoc
     */
    public function destroy(string $id): RedirectResponse
    {
        $draft = Draft::find($id);
        if (is_null($draft))
            return Redirect::route('drafts.index')->with('fail-delete-draft', 'not fount this draft in our dataset');

        $draftTitle = $draft->title;

        if ($draft->delete()) {
            return Redirect::route('drafts.index')->with('success-delete-draft', 'Success delete ' . $draftTitle . ' draft');
        }
        return Redirect::route('drafts.index')->with('fail-delete-draft', 'fail delete ' . $draftTitle . ' draft, try again later');
    }
}
