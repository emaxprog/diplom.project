<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\Frontend\Afisha;
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
        $afisha = Afisha::getAfishaForProductPage();
        $afishaSidebar = Afisha::getAfishaForSidebar();
        $data = [
            'product' => $product,
            'params' => $params,
            'images' => $images,
            'popularProducts' => $popularProducts,
            'afisha' => $afisha,
            'afishaSidebar' => $afishaSidebar
        ];
        return view('product.show', $data);
    }
}
