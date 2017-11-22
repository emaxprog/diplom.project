<?php

namespace App\Models\Backend;

use Illuminate\Support\Facades\Storage;

class Image extends \App\Models\Image
{
    public static function deleteImage($id)
    {
        try {
            $image = self::find($id);
            $url = $image->path;
            $image->delete();
            Storage::delete($url);
            return true;
        } catch (\Exception $exception) {
            return false;
        }
    }
}
