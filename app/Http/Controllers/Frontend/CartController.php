<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\Frontend\Product;
use App\Repositories\Frontend\Afisha;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cart.index', [
            'cart' => Cart::content(),
            'afisha' => Afisha::getAfishaForCartPage()
        ]);
    }

    public function add(Request $request)
    {
        $productId = $request->productId;
        $productName = $request->productName;
        $productQty = $request->productQty ? $request->productQty : 1;
        $productPrice = $request->productPrice;
        $productImage = $request->productImage;
        $productUrl = $request->productUrl;

        $res = Cart::search(function ($cartItem, $rowId) use ($productId) {
            return $cartItem->id === $productId;
        });

        if ($res->isEmpty()) {
            Cart::add(
                $productId,
                $productName,
                $productQty,
                $productPrice,
                [
                    'image' => $productImage,
                    'url' => $productUrl
                ]);
        } else {
            $product = $res->first();
            Cart::update($product->rowId, $product->qty + $productQty);
        }

        return response()->json([
            'success' => true,
        ]);
    }

    public function delete($id)
    {
        $res = Cart::search(function ($cartItem, $rowId) use ($id) {
            return $cartItem->id === $id;
        });

        if ($res->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'Товар не найден в корзине',
            ]);
        } else {
            Cart::remove($res->first()->rowId);

            return response()->json([
                'success' => true,
                'message' => 'Товар успешно удален из корзины',
            ]);
        }
    }

    public function count()
    {
        return response()->json([
            'success' => false,
            'count' => Cart::count(),
        ]);
    }

    public function total()
    {
        return response()->json([
            'success' => true,
            'total' => Cart::total()
        ]);
    }

    public function destroy()
    {
        Cart::destroy();
        return response()->json([
            'success' => true,
            'message' => 'Корзина успешно очищена.'
        ]);
    }

    public function qty(Request $request, $id)
    {
        $productQty = $request->productQty;
        $res = Cart::search(function ($cartItem, $rowId) use ($id) {
            return $cartItem->id === $id;
        });

        $productAmount = Product::find($id)->amount;
        $product = $res->first();
        if ($productAmount < $productQty) {
            return response()->json([
                'success' => false,
                'qty' => $productAmount,
                'productTotal' => $product->price * $product->qty,
                'message' => 'Данный товар доступен в кол-ве ' . $productAmount
            ]);
        } else {
            Cart::update($product->rowId, $productQty);

            return response()->json([
                'success' => true,
                'qty' => $productAmount,
                'productTotal' => $product->price * $product->qty,
            ]);
        }
    }
}
