<?php

namespace App\Repositories\Admin;

use App\Http\Requests\Admin\DomainSocialMediaRequest;
use App\Interfaces\Repositories\Admin\DBAppSettingsInterface;
use App\Models\DomainsSocialMedia;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class AppSettingsRepository implements DBAppSettingsInterface
{

    /**
     * @inheritDoc
     */
    public function index(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('admin.settings.app-settings');
    }

    public function addDomainSocialMedia(DomainSocialMediaRequest $request): RedirectResponse
    {
        $domain = DomainsSocialMedia::create($request->validated());

        if ($domain->isDirty())
            return Redirect::route('app.settings.index')->with('failed', 'failed');

        return Redirect::route('app.settings.index')->with('success', 'successfully');
    }
}
