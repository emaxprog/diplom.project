@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-6">
            @include('include.image_gallery_slider')
        </div>
        <div class="col-md-6">
            <section class="info-product">
                <h2>{{$product->name}}</h2>
                <h1>{!! $product->price !!} руб.</h1>
                <ul class="list-unstyled">
                    <li><b>Код товара:</b> {!! $product->code !!}</li>
                    <li><b>Производитель:</b> {!! $product->manufacturer->name !!}</li>
                    <li><b>Страна производства:</b> {!! $product->manufacturer->country->name !!}</li>
                </ul>
                <div class="button-add-basket">
                    <button type="button" onclick="return false" data-id="{{$product->id}}"
                            data-name="{{$product->name}}"
                            data-price="{{$product->price}}"
                            class="buy-btn btn btn-primary">
                        <i class="fa fa-cart-plus fa-2x"></i>Добавить в корзину
                    </button>
                </div>
            </section>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#about" data-toggle="tab">Описание</a></li>
                <li><a href="#reviews" data-toggle="tab">Отзывы</a></li>
                <li><a href="#comments" data-toggle="tab">Комментарии</a></li>
                <li><a href="#views" data-toggle="tab">Обзоры</a></li>
                <li><a href="#question-answer" data-toggle="tab">Вопрос-ответ</a></li>
            </ul>
            <div class="tab-content">
                <div id="about" class="tab-pane active">
                    <h2>Краткое описание</h2>
                    <p>{!! $product->description !!}</p>
                    <h2>Характеристики</h2>
                    <table class="table table-striped">
                        @foreach($params as $param)
                            <tr>
                                <td><strong>{!! $param->name !!}</strong></td>
                                <td>{!! $param->value !!}</td>
                                <td>{!! $param->unit !!}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <div id="reviews" class="tab-pane">

                </div>
                <div id="comments" class="tab-pane">

                </div>
                <div id="views" class="tab-pane">

                </div>
                <div id="question-answer" class="tab-pane">

                </div>
            </div>
        </div>
    </div>
@endsection