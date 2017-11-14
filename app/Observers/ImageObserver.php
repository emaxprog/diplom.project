<?php
/**
 * Created by PhpStorm.
 * User: alexandr
 * Date: 21.10.17
 * Time: 14:00
 */

namespace App\Observers;

use App\Image;
use Illuminate\Support\Facades\Storage;


class ImageObserver
{
    public function deleted(Image $image)
    {
        $url = $image->path;
        Storage::delete($url);
    }
}