<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Afisha extends Model
{
    protected $guarded = [];

    public function images()
    {
        return $this->belongsToMany(Image::class);
    }

    public static function getVisibilityText($val)
    {
        if ($val)
            return 'Отображается';
        return 'Не отображается';
    }
}
