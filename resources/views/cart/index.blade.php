@extends('layouts.app')
@section('content')
    <!-- pages-title-start -->
    <section class="contact-img-area" @if($afisha) style="background-image: url({{$afisha->path}});" @endif>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="con-text">
                        <h2 class="page-title">Shopping Cart</h2>
                        <p><a href="{{route('home')}}">Home</a> | Shopping Cart</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- pages-title-end -->
    <!-- shopping-cart content section start -->
    <div class="shopping-cart-area s-cart-area">
        <div class="container">
            @if (!$cart->isEmpty())
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <div class="s-cart-all">
                            <div class="cart-form table-responsive">
                                <table id="shopping-cart-table" class="data-table cart-table">
                                    <tr>
                                        <th class="low1">Товар</th>
                                        <th class="low7">Количество, шт</th>
                                        <th class="low7">Стоимость, руб.</th>
                                        <th class="low7">Итого</th>
                                    </tr>
                                    @foreach ($cart as $product)
                                        <tr data-id="{{$product->id}}">
                                            <td class="sop-icon1">
                                                <a class="remove-product"
                                                   data-url="{{route('cart.delete',$product->id)}}">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                            </td>
                                            <td class="sop-cart an-shop-cart">
                                                <a href="#"><img class="primary-image" alt=""
                                                                 src="{{$product->options->image}}"></a>
                                                <a href="#">{{$product->name}}</a>
                                            </td>
                                            <td class="sop-cart an-sh">
                                                <div class="quantity ray">
                                                    <input class="input-text qty text cart-input-qty"
                                                           type="number"
                                                           size="4"
                                                           title="Qty"
                                                           data-id="{{$product->id}}"
                                                           data-price="{{$product->price}}"
                                                           data-toggle="tooltip" value="{{$product->qty}}"
                                                           data-url="{{route('cart.qty',$product->id)}}"
                                                           min="0" step="1">
                                                </div>
                                            </td>
                                            <td class="sop-cart">
                                                <div class="tb-product-price font-noraure-3">
                                                    <span class="amount">{{$product->price}} руб.</span>
                                                </div>
                                            </td>
                                            <td class="cen">
                                                <span class="amount total-price">{{$product->total}}
                                                    руб.</span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="second-all-class">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="sub-total">
                                <table>
                                    <tbody>
                                    <tr class="order-total">
                                        <th>Общая стоимость:</th>
                                        <td>
                                            <strong>
                                                <span class="amount total-cost">{{$product->total}}
                                                    руб.</span>
                                            </strong>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="wc-proceed-to-checkout">
                                <p class="return-to-shop">
                                    <a class="button wc-backward" href="#">Продолжить покупку</a>
                                </p>
                                <a class="wc-forward" href="{{route('order.create')}}"><i
                                            class="fa fa-credit-card fa-lg"></i> Оформить заказ</a>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="row">
                    <div class="col-md-12">
                        <span>Корзина пуста!</span>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <!-- shopping-cart  content section end -->
@endsection