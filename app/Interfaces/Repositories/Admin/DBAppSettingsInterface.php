<?php

namespace App\Interfaces\Repositories\Admin;

use App\Http\Requests\Admin\DomainSocialMediaRequest;
use Illuminate\Http\Request;

interface DBAppSettingsInterface
{
    /**
     * Show App settings page
     */
    public function index();

    public function addDomainSocialMedia(DomainSocialMediaRequest $request);

    public function storeLayoutPicture(Request $request);
}
