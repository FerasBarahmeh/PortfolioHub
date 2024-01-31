<?php

namespace App\Http\Controllers;

use App\FileKit\Upload;
use Illuminate\Http\Request;

class TemporaryFileController extends Controller
{
    public function upload(Request $request)
    {
        $inputName = $request->input('name');
        if ($request->hasFile($inputName)){
            $name = Upload::pushToDir('tmp', $inputName);
            $request->file($inputName);
            return response()->json([
                'folder'=> 'tmp/' . $inputName,
                'file'=> $name,
            ]);
        }
        return '';
    }

    public function delete($nameFolder): \Illuminate\Http\Response
    {
        Upload::deleteContentFolder('tmp', $nameFolder);
        return response()->noContent();
    }
}
