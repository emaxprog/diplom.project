<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'address', 'postcode', 'city_id', 'user_id'
    ];

    public static function rules()
    {
        return [
            'address' => 'required|max:150',
            'postcode' => 'required|integer',
        ];
    }

    public function profile()
    {
        return $this->belongsTo(Profile::class,'user_id','user_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
