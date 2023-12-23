<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\InfoSupplementaryUpdateRequest;
use App\Interfaces\Repositories\Admin\DBInfoSupplementaryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class InfoSupplementaryController extends Controller
{
    private DBInfoSupplementaryInterface $infoSupplementary;

    public function __construct(DBInfoSupplementaryInterface $infoSupplementary)
    {
        $this->infoSupplementary = $infoSupplementary;
    }

    public function edit(Request $request): View
    {
        return $this->infoSupplementary->edit($request);
    }

    public function update(InfoSupplementaryUpdateRequest $request): RedirectResponse
    {
        return $this->infoSupplementary->update($request);
    }
}
