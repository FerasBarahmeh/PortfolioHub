<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AddEducationRequest;
use App\Http\Requests\Admin\DeleteEducationRequest;
use App\Http\Requests\Admin\EditEducationRequest;
use App\Interfaces\Repositories\Admin\DBEducationsInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EducationsController extends Controller
{
    private DBEducationsInterface $educations;
    public function __construct(DBEducationsInterface $educations)
    {
        $this->educations = $educations;
    }

    public function store(AddEducationRequest $request): RedirectResponse
    {
        return  $this->educations->store($request);
    }

    public function update(EditEducationRequest $request, $id): RedirectResponse
    {
        return  $this->educations->update($request, $id);
    }

    public function destroy(DeleteEducationRequest $request): RedirectResponse
    {
        return $this->educations->destroy($request);
    }

}
