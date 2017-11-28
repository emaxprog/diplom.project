<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\Frontend\Product;

class ProductController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $images = $product->images;
        $params = $product->getParams($product->id);
        $popularProducts = $product->getPopularProducts();
        $data = [
            'product' => $product,
            'params' => $params,
            'images' => $images,
            'popularProducts' => $popularProducts
        ];
        return view('product.show', $data);
    }

    public function uploadAmount($id)
    {
        return Product::find($id)->amount;
    }
}
