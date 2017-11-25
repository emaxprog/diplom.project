@extends('layouts.app')

@section('content')
    @if(!empty($afisha))
        @include('include/sections/slider',['afisha'=>$afisha])
    @endif
    @include('include/sections/collection')
    @include('include/sections/new_products',['recommendedProducts' => $recommendedProducts])
    @include('include/sections/testimonials')
    @include('include/sections/new_products2')
    @include('include/sections/blog')
    @include('include/sections/quick_view')
@endsection


{{--<button type="button" class="btn btn-primary btn-block buy-btn"--}}
{{--onclick="return false"--}}
{{--data-id="{{$product->id}}"--}}
{{--data-name="{{$product->name}}"--}}
{{--data-price="{{$product->price}}">--}}
{{--<i class="fa fa-cart-plus fa-2x"></i>--}}
{{--Добавить в корзину--}}
{{--</button>--}}