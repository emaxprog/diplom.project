<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'name', 'surname', 'phone'
    ];

    public static function rules()
    {
        return [
            'name' => 'required|max:30',
            'surname' => 'required|max:30',
            'phone' => 'required|integer',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function addresses()
    {
        return $this->hasMany(Address::class, 'user_id', 'user_id');
    }
}
