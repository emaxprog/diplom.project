@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="{{route('user.store')}}" method="post" enctype="multipart/form-data"
                  class="form form-horizontal">
                {{csrf_field()}}
                <a href="{{route('user.index')}}" class="btn-back btn btn-default"><i class="fa fa-arrow-left"></i>
                    Назад</a>
                <h2 class="text-center">Добавить пользователя</h2>
                <div class="form-group">
                    <label for="username" class="control-label col-md-2">Имя пользователя</label>
                    <div class="col-md-9">
                        <input type="text" name="username" class="form-control" id="username"
                               placeholder="Введите имя пользователя"
                               value="{{ old('username') }}">
                        @if ($errors->has('username'))
                            <div class="alert alert-danger">
                                <strong>{{ $errors->first('username') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="control-label col-md-2">E-Mail</label>
                    <div class="col-md-9">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Введите Email"
                               value="{{ old('email') }}">
                        @if ($errors->has('email'))
                            <div class="alert alert-danger">
                                <strong>{{ $errors->first('email') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="control-label col-md-2">Пароль:</label>
                    <div class="col-md-9">
                        <input type="password" class="form-control" name="password" id="password"
                               placeholder="Введите пароль">
                        @if ($errors->has('password'))
                            <div class="alert alert-danger">
                                <strong>{{ $errors->first('password') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="password_confirmation" class="control-label col-md-2">Подтвердите пароль</label>
                    <div class="col-md-9">
                        <input type="password" class="form-control" name="password_confirmation"
                               id="password_confirmation"
                               placeholder="Подтвердите пароль">
                        @if ($errors->has('password_confirmation'))
                            <div class="alert alert-danger">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="control-label col-md-2">Имя</label>
                    <div class="col-md-9">
                        <input type="text" name="name" class="form-control" id="name" placeholder="Введите имя"
                               value="{{ old('name') }}">
                        @if ($errors->has('name'))
                            <div class="alert alert-danger">
                                <strong>{{ $errors->first('name') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="surname" class="control-label col-md-2">Фамилия</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="surname" id="surname"
                               placeholder="Введите фамилию"
                               value="{{ old('surname') }}">
                        @if ($errors->has('surname'))
                            <div class="alert alert-danger">
                                <strong>{{ $errors->first('surname') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="phone" class="control-label col-md-2">Телефон</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="phone" id="phone" placeholder="Введите телефон"
                               value="{{ old('phone') }}">
                        @if ($errors->has('phone'))
                            <div class="alert alert-danger">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">Страна</label>
                    <div class="col-md-9">
                        <select name="country" class="form-control" id="country">
                            <option value="0">Выбрать...</option>
                            @foreach($countries as $country)
                                <option value="{{$country->id}}">{!! $country->name !!}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">Регион</label>
                    <div class="col-md-9">
                        <select name="region" class="form-control depdrop" id="region"
                                data-depends="[&quot;country&quot;]"
                                data-url="{{route('location.regions')}}"
                                data-placeholder="Выбрать...">
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">Город</label>
                    <div class="col-md-9">
                        <select name="city" class="form-control depdrop" id="city"
                                data-depends="[&quot;country&quot;,&quot;region&quot;]"
                                data-url="{{route('location.cities')}}"
                                data-placeholder="Выбрать...">
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="address" class="control-label col-md-2">Адрес</label>
                    <div class="col-md-9">
                        <input type="text" name="address" class="form-control" value="{{old('address')}}"
                               placeholder="Пример: ул.Шолохова 156а" id="address">
                        @if($errors->has('address'))
                            <div class="alert alert-danger">
                                <strong>{!! $errors->first('address') !!}</strong>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="postcode" class="control-label col-md-2">Почтовый индекс</label>
                    <div class="col-md-9">
                        <input type="text" name="postcode" placeholder="Пример:346422" class="form-control"
                               value="{{old('postcode')}}" id="postcode">
                        @if($errors->has('postcode'))
                            <div class="alert alert-danger">
                                <strong>{!! $errors->first('postcode') !!}</strong>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6">
                        <div class="btn-group">
                            <a href="{{route('user.index')}}" class="btn-back btn btn-default"><i class="fa fa-arrow-left"></i>
                                Назад</a>
                            <button type="submit" formaction="{{route('product.store',['edit'=>true])}}" formmethod="post"
                                    class="btn btn-primary center-block">Сохранить
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection