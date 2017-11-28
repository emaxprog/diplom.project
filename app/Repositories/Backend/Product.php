<?php

namespace App\Repositories\Backend;

use PDO;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class Product extends \App\Models\Product
{
    public function paginateProducts($num)
    {
        return $this->paginate($num);
    }

    public function paginateProductsOfCategory($id, $num)
    {
        return $this->preview()->category($id)->available()->paginate($num);
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
}
