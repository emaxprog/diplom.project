<?php

namespace App;

use App\Http\Requests\Request;
use Illuminate\Database\Eloquent\Model;

class ProductAttributeValue extends Model
{
    protected $table = 'product_attribute_value';
    protected $fillable = ['product_id', 'attribute_id', 'value'];
    public $timestamps = false;

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function attribute()
    {
        return $this->belongsTo(ProductAttribute::class);
    }

    public function deleteAttributes($id)
    {
        return $this->where('product_id', $id)->delete();
    }

    public function deleteAttribute($productId, $attributeId)
    {
        return $this->where('product_id', $productId)->where('attribute_id', $attributeId)->delete();
    }
}
