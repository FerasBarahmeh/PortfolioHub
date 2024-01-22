<?php

namespace App\FileKit;

use App\Models\Image;
use Illuminate\Validation\ValidationException;

class Upload extends AbstractFileKit
{

    /**
     *
     *
     * @throws ValidationException
     */
    public static function uploadFile($inputName, $namespace, $pk, $disk=null, $validation=null): bool|string
    {
        $handel = new Upload($inputName, $disk, $validation);
        return $handel->upload($namespace, $pk);
    }

    /**
     * @throws ValidationException
     */
    public static function uploadFiles($inputName, $namespace, $pk, $disk=null, $validation=null): bool|string
    {
        return self::uploadFile($inputName, $namespace, $pk, $disk, $validation);
    }

    public static  function rubOut(Image $image): int
    {
        return Upload::delete($image);
    }
}
