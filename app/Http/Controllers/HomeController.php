<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Afisha;
use Illuminate\Contracts\Queue\Queue;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $productModel)
    {
        $latestProducts = $productModel->getLatestProducts();
        $recommendedProducts = $productModel->getRecommendedProducts();
        $images = Afisha::getImages();
        $data = [
            'latestProducts' => $latestProducts,
            'recommendedProducts' => $recommendedProducts,
            'images' => $images,
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
