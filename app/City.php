<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public $timestamps = false;

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function profiles()
    {
        return $this->belongsToMany(Profile::class);
    }
}
