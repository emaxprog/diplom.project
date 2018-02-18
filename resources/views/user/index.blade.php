@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center">Пользователи</h2>
            <a href="{{route('user.create')}}" class="btn-add-product btn btn-primary"><i
                        class="fa fa-plus"></i> Добавить
                пользователя</a>
            @if(!count($users))
                <div>
                    <p>Пользователи отсутствуют</p>
                </div>
            @else
                <h4>Список пользователей</h4>
                <table class="table table-stripes">
                    <thead>
                    <tr>
                        <th>Имя пользователя</th>
                        <th>E-mail</th>
                        <th>Имя</th>
                        <th>Фамилия</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                        <tr data-id="{{$user->id}}">
                            <td>{{$user->username}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->profile->name}}</td>
                            <td>{{$user->profile->surname}}</td>
                            <td><a href="{{route('user.show',['id'=>$user->id])}}" class="btn btn-default"
                                   title="Смотреть"><i
                                            class="fa fa-eye fa-lg"></i></a></td>
                            <td><a href="{{route('user.edit',['id'=>$user->id])}}" class="btn btn-info"
                                   title="Редактировать"><i
                                            class="fa fa-edit fa-lg"></i></a></td>
                            <td>
                                <button type="button" data-id="{{$user->id}}" class="delete delete-user btn btn-danger">
                                    <i
                                            class="fa fa-trash-alt fa-lg"></i></button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection