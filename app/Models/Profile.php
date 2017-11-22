<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'name', 'surname', 'phone', 'address', 'postcode', 'city_id'
    ];

    public static function rules()
    {
        return [
            'name' => 'required|max:30',
            'surname' => 'required|max:30',
            'phone' => 'required|integer',
            'address' => 'required|max:150',
            'postcode' => 'required|integer',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
