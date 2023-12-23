<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\InfoSupplementaryUpdateRequest;
use App\Http\Requests\Admin\ProfileUpdateRequest;
use App\Interfaces\Repositories\Admin\DBSettingsInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SettingsController extends Controller
{
    private DBSettingsInterface $settings;

    public function __construct(DBSettingsInterface $settings)
    {
        $this->settings = $settings;
    }

    public function index(): View
    {
        return $this->settings->index();
    }

    public function updateMainInfo(ProfileUpdateRequest $request): RedirectResponse
    {
        return  $this->settings->updateMainInfo($request);
    }

    public function updateSupplementaryInfo(InfoSupplementaryUpdateRequest $request): RedirectResponse
    {
        return  $this->settings->updateSupplementaryInfo($request);
    }

    public function destroy(Request $request): RedirectResponse
    {
        return $this->settings->destroy($request);
    }

}
