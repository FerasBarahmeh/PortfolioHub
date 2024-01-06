<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ExtensionsInfoUpdateRequest;
use App\Interfaces\Repositories\Admin\DBExtensionsInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminExtensionsController extends Controller
{
    private DBExtensionsInterface $infoSupplementary;

    public function __construct(DBExtensionsInterface $infoSupplementary)
    {
        $this->infoSupplementary = $infoSupplementary;
    }

    public function edit(Request $request): View
    {
        return $this->infoSupplementary->edit($request);
    }

    public function update(ExtensionsInfoUpdateRequest $request): RedirectResponse
    {
        return $this->infoSupplementary->update($request);
    }
}
