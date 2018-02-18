@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center">Управление товарами</h2>
            <a href="{{route('product.create')}}" class="btn-add-product btn btn-primary"><i
                        class="fa fa-plus"></i> Добавить
                товар</a>
            <h4>Список товаров</h4>
            <table class="table table-striped" id="table-products-ajax">
                <thead>
                <tr>
                    <th>Артикул</th>
                    <th>Название товара</th>
                    <th>Цена</th>
                    <th>Цена со скидкой</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($products as $product)
                    <tr data-id="{{$product->slug}}">
                        <td>{!! $product->code !!}</td>
                        <td>{!! $product->name !!}</td>
                        <td>{!! $product->price !!} руб.</td>
                        <td>{!! $product->sale_price !!} руб.</td>
                        <td><a href="{{route('product.edit',[$product])}}" class="btn btn-info"
                               title="Редактировать"><i
                                        class="fa fa-edit fa-lg"></i></a></td>
                        <td>
                            <button type="button" data-id="{{$product->slug}}"
                                    class="delete delete-product btn btn-danger"><i
                                        class="fa fa-trash-alt fa-lg"></i></button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="col-md-12 div-pagination">
                    <div class="pagination">
                        {!! $products->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection