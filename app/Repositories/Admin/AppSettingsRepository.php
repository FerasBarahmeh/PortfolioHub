<?php

namespace App\Repositories\Admin;

use App\Enums\Disks;
use App\FileKit\Upload;
use App\Http\Requests\Admin\DomainSocialMediaRequest;
use App\Interfaces\Repositories\Admin\DBAppSettingsInterface;
use App\Models\DomainsSocialMedia;
use App\Models\Image;
use App\Models\LayoutPicture;
use App\Models\TemporaryFile;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

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

    public function storeLayoutPicture(Request $request): RedirectResponse
    {
        if ($request->has('layout-img')) {
            $admin = Auth::user();
            foreach ($admin->layout->image as $image) {
                $image->delete();
            }
            $layoutImg = json_decode($request->input('layout-img'));
            $layout = LayoutPicture::create(['admin_id' => Auth::id()]);
            $folder = explode('/', $layoutImg->folder);

            Storage::copy(
                'public/' . $layoutImg->folder . '/' . $layoutImg->file,
                'public/app-images/' . $folder[1] . '/' . $layoutImg->file
            );

            $img = Image::create([
                'url' => 'app-images/' . $folder[1] . '/' . $layoutImg->file,
                'nameFile' => $layoutImg->file,
                'imageable_id' => $layout->id,
                'imageable_type' => LayoutPicture::class,
                'disk' => Disks::Public->value,
            ]);
            if ($img) {
                Upload::deleteContentFolder($folder[0], $folder[1]);
                TemporaryFile::truncate();
                return Redirect::route('app.settings.index')->with('success-change-layout', 'successfully change layout');
            }
        }

        Upload::deleteContentFolder('tmp', 'layout-img');
        TemporaryFile::truncate();
        return Redirect::route('app.settings.index')->with('fail-change-layout', 'fail change layout');
    }
}
