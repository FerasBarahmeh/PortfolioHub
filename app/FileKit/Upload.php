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
    public static function uploadFile($inputName, $namespace, $pk, $disk=null, $validation=null): Upload|bool
    {
        $handel = new Upload($inputName, $disk, $validation);
        $handled = $handel->upload($namespace, $pk);
        if ($handled) return  $handel;
        return false;
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

    public static function eraseByName($name): int
    {
        return Upload::deleteByName($name);
    }

    public function getImages(): array
    {
        return $this->sortedFiles;
    }

    public function getImage()
    {
        return $this->sortedFiles[0];
    }

    public static function getFileByName($name)
    {
        return Image::getByNameAttribute($name);
    }
}
