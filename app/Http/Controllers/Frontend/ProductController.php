<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreComment;
use App\Models\Comment;
use App\Repositories\Frontend\Afisha;
use App\Repositories\Frontend\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $authCheck = Auth::check();
        $data = [
            'product' => $product,
            'params' => $params,
            'images' => $images,
            'popularProducts' => $popularProducts,
            'afisha' => $afisha,
            'afishaSidebar' => $afishaSidebar,
            'authCheck' => $authCheck,
        ];
        return view('product.show', $data);
    }

    public function review(Product $product, StoreComment $request)
    {
        if (!Auth::check())
            return redirect()->route('product.show', $product);

        $comment = Comment::create([
            'review' => $request->review,
            'rating' => $request->rating,
            'product_id' => $product->id,
            'user_id' => Auth::id()
        ]);

        return redirect()->route('product.show', $product);
    }
}
