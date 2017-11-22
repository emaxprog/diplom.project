<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

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
        $data = [
            'orderProducts' => $order
        ];
        return view('basket.index', $data);
    }
}
