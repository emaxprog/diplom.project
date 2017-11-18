<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Product;
use App\Afisha;
use Illuminate\Contracts\Queue\Queue;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product, Category $category)
    {
        $categories = $category->getCategories();
        if ($categories->isEmpty()) {
            return view('welcome');
        }
        $latestProducts = $product->getLatestProducts();
        $recommendedProducts = $product->getRecommendedProductsGroupByCategory();
//        $images = Afisha::getImages();
        $data = [
            'categories' => $categories,
            'latestProducts' => $latestProducts,
            'recommendedProducts' => $recommendedProducts,
        ];
        return view('home', $data);
    }

    public function feedback(Request $request)
    {
        $data = [
            'email' => $request->input('email'),
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'message' => $request->input('message'),
        ];
        Queue::push(new Feedback($data));
        return 'Сообщение отправлено!';
    }
}
