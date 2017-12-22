@extends('layouts.app')

@section('content')
    @if(!empty($afishaSlider))
        @include('include/sections/slider',['afisha'=>$afishaSlider])
    @endif
    @include('include/sections/collection')
    @include('include/sections/new_products',['recommendedProducts' => $recommendedProducts])
    @include('include/sections/testimonials',['afisha' => $afishaTestimonials])
    @include('include/sections/new_products2')
    @include('include/sections/blog')
@endsection


{{--<button type="button" class="btn btn-primary btn-block buy-btn"--}}
{{--onclick="return false"--}}
{{--data-id="{{$product->id}}"--}}
{{--data-name="{{$product->name}}"--}}
{{--data-price="{{$product->price}}">--}}
{{--<i class="fa fa-cart-plus fa-2x"></i>--}}
{{--Добавить в корзину--}}
{{--</button>--}}