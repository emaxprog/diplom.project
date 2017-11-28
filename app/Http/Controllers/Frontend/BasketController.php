<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\Frontend\Afisha;

class BasketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = [];
        if (isset($_COOKIE['basket'])) {
            $order = json_decode($_COOKIE['basket']);
        }
        $afisha = Afisha::getAfishaForCartPage();
        $data = [
            'orderProducts' => $order,
            'afisha' => $afisha
        ];
        return view('basket.index', $data);
    }
}
