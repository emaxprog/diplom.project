<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Models\ProductAttributeValue;

class ProductAttributeValueController extends \App\Http\Controllers\Controller
{
    public function destroy($id, Request $request, ProductAttributeValue $pavModel)
    {
        $attributeId = $request->attributeId;
        return $pavModel->deleteAttribute($id, $attributeId);
    }
}
