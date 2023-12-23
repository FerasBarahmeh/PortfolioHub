<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DomainSocialMediaRequest;
use App\Interfaces\Repositories\Admin\DBAppSettingsInterface;

class AppSettingsController extends Controller
{
    private DBAppSettingsInterface $appSettings;
    public function __construct(DBAppSettingsInterface $appSettings)
    {
        $this->appSettings = $appSettings;
    }


    public function index()
    {
        return $this->appSettings->index();
    }

    public function addDomainSocialMedia(DomainSocialMediaRequest $request)
    {
        return $this->appSettings->addDomainSocialMedia($request);
    }
}
