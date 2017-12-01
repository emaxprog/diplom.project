<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Address;
use App\Models\Order;
use App\Repositories\Frontend\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Delivery;
use App\Models\Payment;
use App\Events\OrderIsConfirmed;
use App\Models\Country;
use App\Repositories\Frontend\Afisha;

class OrderController extends \App\Http\Controllers\Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!isset($_COOKIE['basket'])) {
            return redirect()->route('home');
        }

        $order = [];
        if (isset($_COOKIE['basket'])) {
            $order = json_decode($_COOKIE['basket']);
        }
        $afisha = Afisha::getAfishaForCartPage();
        $countries = Country::all();
        $deliveries = Delivery::all();
        $payments = Payment::all();
        $user = Auth::user();
        $data = [
            'countries' => $countries,
            'deliveries' => $deliveries,
            'payments' => $payments,
            'orderProducts' => $order,
            'afisha' => $afisha,
            'user' => $user
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
        if (!Auth::check())
            return redirect()->route('order.create');
        $orderProducts = json_decode($_COOKIE['basket']);
        $user = Auth::user();
        $order = new Order();
        if ($request->address_id == 'new') {
            $address = new Address([
                'address' => $request->address,
                'postcode' => $request->postcode,
                'city_id' => $request->city
            ]);
            if ($request->address_save) {
                $user->profile->addresses()->save($address);
            } else {
                $address->save();
            }
            $order->address_id = intval($address->id);
        } else {
            $order->address_id = intval($request->address_id);
        }
        if ($request->comment) {
            $order->comment = $request->comment;
        }

        $order->delivery_id = $request->delivery;
        $order->payment_id = $request->payment;
        $user->orders()->save($order);
        $totalCost = 0;
        foreach ($orderProducts as $orderProduct) {
            $order->products()->attach($orderProduct->productId, ['amount' => $orderProduct->amount]);
            $totalCost += $orderProduct->price * $orderProduct->amount;
            $product = Product::find($orderProduct->productId);
            $product->amount -= $orderProduct->amount;
            $product->save();
        }
        $totalCost += Delivery::find($request->delivery)->price;
        $payments = Payment::all();
        $data = [
            'address'=>$order->address,
            'payments'=>$payments,
            'order' => $order,
            'user' => $user,
            'orderProducts' => $orderProducts,
            'totalCost' => $totalCost
        ];
        setcookie('basket', '');

//        event(new OrderIsConfirmed(Auth::user()));

        return view('order.store', $data);
    }
}
