<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use PDO;

class Product extends Model
{

    protected $guarded = ['edit', 'image_preview','parameters','values'];

    public $timestamps = false;

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

    public function saveImages($uploadedImages)
    {
        foreach ($uploadedImages as $uploadedImage) {
            $image = $this->saveImage($uploadedImage);

            $this->images()->attach($image->id);
        }
        return true;
    }

    private function saveImage($uploadedImage)
    {
        $path = $uploadedImage->store('images/products/' . $this->id, 'public');

        $image = new Image();
        $image->original_name = $uploadedImage->getClientOriginalName();
        $image->extension = $uploadedImage->getClientOriginalExtension();
        $image->size = $uploadedImage->getClientSize();
        $image->mime_type = $uploadedImage->getClientMimeType();
        $image->path = Storage::url($path);
        $image->save();

        return $image;
    }

    public function saveImagePreview($uploadedImage)
    {
        try {
            $image = $this->saveImage($uploadedImage);
            if ($image && $this->imagePreview) {
                $this->imagePreview->delete();
            }
            $this->image_preview_id = $image->id;
            return true;
        } catch (\Exception $exception) {
            return false;
        }
    }

    public function getImagePreviewInitialPreviewData()
    {
        if (!$this->imagePreview) {
            return $this->asJson([]);
        }

        $previewConfig = [];
        $previewUrls = [];

        $previewConfig[] = [
            'caption' => $this->imagePreview->original_name,
            'downloadUrl' => $this->imagePreview->path,
            'size' => $this->imagePreview->size,
            'key' => $this->imagePreview->id
        ];

        $previewUrls[] = $this->imagePreview->path;

        $previewData = [
            'initialPreviewConfig' => $previewConfig,
            'initialPreview' => $previewUrls
        ];
        return $this->asJson($previewData);
    }

    public function getImagesInitialPreviewData()
    {
        if (!$this->images) {
            return $this->asJson([]);
        }
        $previewConfig = [];
        $previewUrls = [];

        foreach ($this->images as $image) {
            $previewConfig[] = [
                'caption' => $image->original_name,
                'downloadUrl' => $image->path,
                'size' => $image->size,
                'key' => $image->id
            ];
            $previewUrls[] = $image->path;
        }

        $previewData = [
            'initialPreviewConfig' => $previewConfig,
            'initialPreview' => $previewUrls
        ];
        return $this->asJson($previewData);
    }

    public function savePAV($attrValue)
    {
        foreach ($attrValue as $attr => $value) {
            $productAttrValue = new ProductAttributeValue();
            $productAttrValue->product_id = $this->id;
            $productAttrValue->attribute_id = $attr;
            $productAttrValue->value = $value;
            $productAttrValue->save();
        }
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
