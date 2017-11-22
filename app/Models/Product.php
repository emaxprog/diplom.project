<?php

namespace App\Models;

use PDO;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;


class Product extends Model
{

    protected $guarded = ['edit', 'image_preview', 'images', 'parameters', 'values'];

    public $timestamps = false;

    public function getRouteKeyName()
    {
        return 'slug';
    }

    const PATH_TO_IMAGES_OF_PRODUCTS = '/template/images/content/products/';
    const PATH_TO_NO_IMAGE = '/template/images/site/noImage.jpg';

    public function orders()
    {
        return $this->belongsToMany(Order::class)->withPivot('amount');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function imagePreview()
    {
        return $this->belongsTo(Image::class);
    }

    public function images()
    {
        return $this->belongsToMany(Image::class);
    }

    public function attribute_values()
    {
        return $this->hasMany(ProductAttributeValue::class);
    }

    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class);
    }

    public function scopeAvailable($query)
    {
        $query->where('amount', '>=', 1);
    }

    public function scopeSearchCode($query, $val)
    {
        $query->where('code', 'like', '%' . $val . '%');
    }

    public function scopeRangePrice($query, $minPrice, $maxPrice)
    {
        $query->whereBetween('price', [$minPrice, $maxPrice]);
    }

    public function scopeManufacturers($query, $manufacturersIds)
    {
        $query->whereIn('manufacturer_id', $manufacturersIds);
    }

    public function scopeByCategory($query, $id)
    {
        $query->where('category_id', $id);
    }

    public function scopePreview($query)
    {
        $query->select('id', 'name', 'price', 'is_new', 'is_recommended');
    }

    public function scopePublished($query)
    {
        $query->where('visibility', 1);
    }

    public function scopeRecommended($query)
    {
        $query->where('is_recommended', 1);
    }

    public function scopePopular($query)
    {
        $query->where('is_popular', 1);
    }

    public function scopeSale($query)
    {
        $query->whereNotNull('sale_price');
    }
}
