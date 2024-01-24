<?php

namespace App\Http\Controllers;

use App\FileKit\Upload;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class CKEditorController extends Controller
{
    /**
     * @throws ValidationException
     */
    public function store(Request $request): JsonResponse|string
    {
        $pk = $request->input('pk');

        if ($request->hasFile('upload')) {
            $fileName = Upload::uploadFile('upload', $request->input('namespace'), 0);
            $imag = $fileName->getImage();
            $url = Storage::url($imag->url);
            return response()->json([
                'fileName' => $fileName,
                'uploaded' => true,
                'url' => $url,
            ]);

        }
        return '';
    }

    public function delete(Request $request): JsonResponse
    {
        $path = $request->input('path');
        $name = basename($path);
        $image = Upload::eraseByName($name);

        return response()->json([
            'name' => $name,
        ]);


    }
}


