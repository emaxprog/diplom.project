<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $fillable = [
        'name', 'surname', 'phone', 'address', 'postcode', 'city_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
