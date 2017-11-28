<?php

namespace App\Http\Controllers\Backend;

use App\Models\Order;
use App\Models\OrderStatus;
use App\Repositories\Backend\Product;
use Illuminate\Http\Request;
use Auth;
use App\Models\Delivery;
use App\Models\Payment;
use App\Events\OrderIsConfirmed;
use App\Models\Country;

class OrderController extends \App\Http\Controllers\Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::latest('id')->get();
        $data = [
            'orders' => $orders
        ];
        return view('order.index', $data);
    }

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

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);
        $user = $order->user;
        $products = $order->products;
        $totalPrice = $order->products->sum('price');
        $data = [
            'order' => $order,
            'user' => $user,
            'products' => $products,
            'totalPrice' => $totalPrice
        ];

        return view('order.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::find($id);
        $statusList = OrderStatus::all();
        $data = [
            'order' => $order,
            'statusList' => $statusList
        ];

        return view('order.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $order = Order::find($id);
        $order->status_id = $request->status;
        $order->save();

        return redirect()->route('order.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Order::destroy($id);

        return 'OK';
    }
}
