<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    public $timestamps = false;

    protected $fillable = ['original_name', 'extension', 'size', 'mime_type', 'path'];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

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
