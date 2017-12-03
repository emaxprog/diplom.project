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
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);
        $products = $order->products;
        $totalPrice = $order->products->sum('price');
        $data = [
            'order' => $order,
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
