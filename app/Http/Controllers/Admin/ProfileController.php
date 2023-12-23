<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProfileUpdateRequest;
use App\Interfaces\Repositories\Admin\DBProfileInterface;
use App\Repositories\Admin\ProfileRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
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
}
