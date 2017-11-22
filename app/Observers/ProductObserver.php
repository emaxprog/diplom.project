<?php
/**
 * Created by PhpStorm.
 * User: alexandr
 * Date: 16.10.17
 * Time: 1:46
 */

namespace App\Observers;


use App\Models\Backend\Product;

class ProductObserver
{
    public function deleting(Product $product)
    {
        try {
            if ($product->imagePreview) {
                $product->imagePreview->delete();
            }

            return true;
        } catch (\Exception $exception) {
            return false;
        }
    }
}