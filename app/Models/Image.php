<?php

namespace App\Models;

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
}
