<?php

namespace App\Models\Backend;

use PDO;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class Afisha extends \App\Models\Afisha
{
    public $guarded = ['images'];

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
        $path = $uploadedImage->store('images/afishas/' . $this->id, 'public');

        $image = new Image();
        $image->original_name = $uploadedImage->getClientOriginalName();
        $image->extension = $uploadedImage->getClientOriginalExtension();
        $image->size = $uploadedImage->getClientSize();
        $image->mime_type = $uploadedImage->getClientMimeType();
        $image->path = Storage::url($path);
        $image->save();

        return $image;
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
}
