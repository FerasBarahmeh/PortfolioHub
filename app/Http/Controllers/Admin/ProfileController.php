<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ServiceRequest;
use App\Http\Requests\Admin\SocialAccountRequest;
use App\Interfaces\Repositories\Admin\DBProfileInterface;
use Illuminate\View\View;

class ProfileController extends Controller
{
    private DBProfileInterface $profileRepository;

    public function __construct(DBProfileInterface $profileRepository)
    {
        $this->profileRepository = $profileRepository;
    }

    public function index(): View
    {
        return $this->profileRepository->index();
    }

    public function changeSocialAccount(SocialAccountRequest $request)
    {
        return $this->profileRepository->changeSocialAccount($request);
    }

    public function changeService(ServiceRequest $request)
    {
        return $this->profileRepository->changeService($request);
    }
}
