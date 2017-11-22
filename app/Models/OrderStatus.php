<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    public $timestamps = false;

    protected $table = 'order_status';

    public function order()
    {
        return $this->belongsToMany(Order::class);
    }
}
