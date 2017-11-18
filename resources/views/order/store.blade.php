@extends('layouts.app')
@section('content')
    <!-- pages-title-start -->
    <section class="contact-img-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="con-text">
                        <h2 class="page-title">Shopping Cart</h2>
                        <p><a href="#">Home</a> | Shopping Cart</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- pages-title-end -->
    <!-- shopping-cart content section start -->
    <div class="shopping-cart-area s-cart-area">
        <div class="container">
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
                                @foreach ($orderProducts as $product)
                                    <tr data-id="{{$product->productId}}">
                                        <td class="sop-cart an-shop-cart">
                                            <a href="#"><img class="primary-image" alt="" src="{{$product->img}}"></a>
                                            <a href="#">{{$product->name}}</a>
                                        </td>
                                        <td class="sop-cart an-sh">
                                            {{$product->amount}}
                                        </td>
                                        <td class="sop-cart">
                                            <div class="tb-product-price font-noraure-3">
                                                <span class="amount">{{$product->price}} руб.</span>
                                            </div>
                                        </td>
                                        <td class="cen">
                                            <span class="amount">{{$product->price*$product->amount}} руб.</span>
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
                                    <th>Общая стоимость с доставкой</th>
                                    <td>
                                        <strong>
                                            <span class="amount">{{$totalCost}} руб.</span>
                                        </strong>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="wc-proceed-to-checkout">
                            <p class="return-to-shop">
                                <a class="button wc-backward" href="{{route('home')}}">На главную</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection