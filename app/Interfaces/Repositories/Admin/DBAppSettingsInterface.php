<?php

namespace App\Interfaces\Repositories\Admin;

use App\Http\Requests\Admin\DomainSocialMediaRequest;

interface DBAppSettingsInterface
{
    /**
     * Show App settings page
     */
    public function index();

    public function addDomainSocialMedia(DomainSocialMediaRequest $request);
}
