@extends('layouts.app')

@section('content')
    @include('include/sections/slider')
    @include('include/sections/collection')
    @include('include/sections/new_products')
    @include('include/sections/testimonials')
    @include('include/sections/new_products2')
    @include('include/sections/blog')
    @include('include/sections/quick_view')
    @include('include/sections/brand')
    @include('include/sections/service')
@endsection


{{--<button type="button" class="btn btn-primary btn-block buy-btn"--}}
        {{--onclick="return false"--}}
        {{--data-id="{{$product->id}}"--}}
        {{--data-name="{{$product->name}}"--}}
        {{--data-price="{{$product->price}}">--}}
    {{--<i class="fa fa-cart-plus fa-2x"></i>--}}
    {{--Добавить в корзину--}}
{{--</button>--}}