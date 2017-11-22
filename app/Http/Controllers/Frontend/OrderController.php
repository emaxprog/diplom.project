<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Order;
use App\Models\Frontend\Product;
use Illuminate\Http\Request;
use Auth;
use App\Models\Delivery;
use App\Models\Payment;
use App\Events\OrderIsConfirmed;
use App\Models\Country;

class OrderController extends \App\Http\Controllers\Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::check())
            return redirect('/login');
        if (!isset($_COOKIE['basket'])) {
            return redirect()->route('home');
        }

        $countries = Country::all();
        $deliveries = Delivery::all();
        $payments = Payment::all();
        $data = [
            'countries' => $countries,
            'deliveries' => $deliveries,
            'payments' => $payments,
        ];
        return view('order.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $orderProducts = json_decode($_COOKIE['basket']);
        $order = new Order();
        $order->delivery_id = $request->delivery;
        $order->payment_id = $request->payment;
        Auth::user()->orders()->save($order);
        $totalCost = 0;
        foreach ($orderProducts as $orderProduct) {
            $order->products()->attach($orderProduct->productId, ['amount' => $orderProduct->amount]);
            $totalCost += $orderProduct->price * $orderProduct->amount;
            $product = Product::find($orderProduct->productId);
            $product->amount -= $orderProduct->amount;
            $product->save();
        }
        $totalCost += Delivery::find($request->delivery)->price;
        $data = [
            'orderProducts' => $orderProducts,
            'totalCost' => $totalCost
        ];
        setcookie('basket', '');

//        event(new OrderIsConfirmed(Auth::user()));

        return view('order.store', $data);
    }
}
