<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    public $timestamps = false;

    protected $table = 'order_product';

    protected $fillable = ['order_id', 'product_id', 'amount'];

}
