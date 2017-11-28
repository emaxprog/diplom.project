<?php

namespace App\Repositories\Backend;


class ProductAttributeValue extends \App\Models\ProductAttributeValue
{
    public function deleteAttributes($productId)
    {
        return $this->where('product_id', $productId)->delete();
    }

    public function deleteAttribute($productId, $attributeId)
    {
        return $this->where('product_id', $productId)->where('attribute_id', $attributeId)->delete();
    }
}
