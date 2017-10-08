<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use PDO;

class Product extends Model
{

    protected $fillable = [
        'name',
        'alias',
        'category_id',
        'manufacturer_id',
        'description',
        'price',
        'code',
        'availability',
        'is_new',
        'is_recommended',
        'visibility',
        'amount',
    ];

    public $timestamps = false;

    protected $casts = [
        'images' => 'array'
    ];

    public static $rules = [
        'name' => 'required',
        'alias' => 'required',
        'code' => 'required|integer',
        'price' => 'required|integer',
        'amount' => 'required|integer'
    ];

    const PATH_TO_IMAGES_OF_PRODUCTS = '/template/images/content/products/';
    const PATH_TO_NO_IMAGE = '/template/images/site/noImage.jpg';

    public function orders()
    {
        return $this->belongsToMany(Order::class)->withPivot('amount');
    }

    public function attribute_values()
    {
        return $this->hasMany(ProductAttributeValue::class);
    }

    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class);
    }

    public function getSelectedProducts($id, $num, $minPrice, $maxPrice, $manufacturersIds)
    {
        if ($minPrice == null && $maxPrice == null) {
            $minPrice = 0;
            $maxPrice = 9999999999;
        }
        if ($manufacturersIds == null)
            return $selectedProducts = $this->preview()->category($id)
                ->rangePrice($minPrice, $maxPrice)
                ->paginate($num);
        return $selectedProducts = $this->preview()->category($id)
            ->manufacturers($manufacturersIds)
            ->rangePrice($minPrice, $maxPrice)
            ->paginate($num);
    }

    public function getLatestProducts()
    {
        return $this->latest('id')->preview()->available()->published()->take(6)->get();

    }

    public function getRecommendedProducts()
    {
        return $this->latest('id')->preview()->recommended()->available()->published()->take(3)->get();
    }

    public static function getPreview($images)
    {
        return $images != null ? $images[0] : self::PATH_TO_NO_IMAGE;
    }

    public static function getImage($imagePath)
    {
        return $imagePath != null ? $imagePath : self::PATH_TO_NO_IMAGE;
    }

    public function paginateProducts($num)
    {
        return $this->paginate($num);
    }

    public function paginateProductsOfCategory($id, $num)
    {
        return $this->preview()->category($id)->available()->paginate($num);
    }

    public function getUploadProducts($startFrom = 0)
    {
        return $this->latest('id')->skip($startFrom)->take(5)->get();
    }

    public function getProductsSearch($val)
    {
        return $this->searchCode($val)->get();
    }

    public static function getParams($id)
    {
        $db = DB::connection()->getPdo();
        $result = $db->prepare("CALL get_params(:id)");
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->execute();
        $params = self::getArrayObjects($result);
        return $params;
    }

    private static function getArrayObjects($result)
    {
        $params = [];
        while ($row = $result->fetchObject()) {
            $params[] = $row;
        }
        return $params;
    }

    public static function saveImages($imageFiles, &$product = null)
    {
        $root = $_SERVER['DOCUMENT_ROOT'] . Product::PATH_TO_IMAGES_OF_PRODUCTS;
        $images = [];
        foreach ($imageFiles as $image) {
            if (empty($image))
                continue;
            $imageName = $image->getClientOriginalName();
            $images[] = Product::PATH_TO_IMAGES_OF_PRODUCTS . $imageName;
            $image->move($root, $imageName);
        }
        if ($product) {
            if ($product->images != null) {
                $product->images = array_merge($product->images, $images);
            } else {
                $product->images = $images;
            }
        }
        return $images;
    }

    public static function deleteImages($imageSrc, $id)
    {
        $root = $_SERVER['DOCUMENT_ROOT'];
        $product = self::find($id);
        $images = $product->images;
        if (($key = array_search($imageSrc, $images)) >= 0) {
            unset($images[$key]);
            if (file_exists($root . $imageSrc))
                unlink($root . $imageSrc);
        }
        $product->images = null;
        if (!empty($images)) {
            $product->images = $images;
        }
        $product->save();
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

    public function scopeCategory($query, $id)
    {
        $query->where('category_id', $id);
    }

    public function scopePreview($query)
    {
        $query->select('id', 'name', 'price', 'is_new', 'is_recommended', 'images');
    }

    public function scopePublished($query)
    {
        $query->where('visibility', 1);
    }

    public function scopeRecommended($query)
    {
        $query->where('is_recommended', 1);
    }
}
