<?php

namespace App\FileKit;

use App\Models\Image;

trait DBOperation
{
    public function sortRecord($url, $imageableID, $imageableType, $disk): void
    {
        /*** @var object $img  by default contain object Image Model */

        $img = $img ?? new Image();
        $img->url = $url;
        $img->imageable_id = $imageableID;
        $img->imageable_type = $imageableType;
        $img->disk = $disk;
        $img->save();
    }

    public  function kickOutRecord($id): int
    {
        return Image::destroy($id);
    }
}
