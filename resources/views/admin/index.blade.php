@extends('layouts.admin')
@section('content')
    <div class="wrapper-content">
        <div class="mid">
            <div class="center">
                <div class="admin">
                    <h2 class="admin-title">Добрый день, администратор!</h2>
                    <ul class="admin-menu">
                        <li><a href="{{route('user.index')}}"><i class="far fa-5x fa-user fa-lg"></i><div class="caption">Пользователи</div></a></li>
                        <li><a href="{{route('product.index')}}"><i class="far fa-5x fa-clipboard fa-lg"></i><div class="caption">Товары</div></a></li>
                        <li><a href="{{route('category.index')}}"><i class="far fa-5x fa-folder-open fa-lg"></i><div class="caption">Категории</div></a></li>
                        <li><a href="{{route('order.index')}}"><i class="far fa-5x fa-list-alt fa-lg"></i><div class="caption">Заказы</div></a></li>
                        <li><a href="{{route('afisha.index')}}"><i class="far fa-5x fa-images fa-lg"></i><div class="caption">Афишы</div></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection