@extends('layouts.admin')
@section('content')
    <div class="center-admin">
        <div class="admin-view">
            <h2 class="text-center">Пользователь #{!! $user->id !!}</h2>

            <h3>Информация о пользователе</h3>
            <table class="table table-striped">
                <tbody>
                <tr>
                    <td>Имя пользователя</td>
                    <td>{{$user->username}}</td>
                </tr>
                <tr>
                    <td>E-mail</td>
                    <td>{{$user->email}}</td>
                </tr>
                <tr>
                    <td>Имя</td>
                    <td>{{$user->profile->name}}</td>
                </tr>
                <tr>
                    <td>Фамилия</td>
                    <td>{{$user->profile->surname}}</td>
                </tr>
                <tr>
                    <td>Телефон</td>
                    <td>{{$user->profile->phone}}</td>
                </tr>
                <tr>
                    <td>Зарегистрирован</td>
                    <td>{{$user->created_at}}</td>
                </tr>
                </tbody>
            </table>

            <h3>Адреса</h3>
            <?php $i = 0; ?>
            @foreach($user->profile->addresses as $address)
                <h4>Адрес № <?= ++$i; ?></h4>
                <table class="table table-striped">
                    <tbody>
                    <tr>
                        <td>Страна</td>
                        <td>{{$address->city->region->country->name}}</td>
                    </tr>
                    <tr>
                        <td>Регион</td>
                        <td>{{$address->city->region->name}}</td>
                    </tr>
                    <tr>
                        <td>Город</td>
                        <td>{{$address->city->name}}</td>
                    </tr>
                    <tr>
                        <td>Почтовый индекс</td>
                        <td>{{$address->postcode}}</td>
                    </tr>
                    <tr>
                        <td>Адрес</td>
                        <td>{{$address->address}}</td>
                    </tr>
                    </tbody>
                </table>
            @endforeach
            <a href="{{route('user.index')}}" class="btn-back btn btn-primary"><i class="fa fa-arrow-left"></i>
                Назад</a>
        </div>
    </div>
@endsection