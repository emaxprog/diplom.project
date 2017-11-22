@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('user.update',['id'=>$user->id])  }}" method="post"
                  class="form form-horizontal">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="PUT">

                <h2 class="text-center">Редактировать пользователя</h2>
                <div class="form-group">
                    <label for="username" class="control-label col-md-2">Роль пользователя</label>
                    <div class="col-md-3">
                        <label><input type="radio"
                                      name="role" value="User" {{$user->hasRole('user')?'checked':''}}>Пользователь</label>
                    </div>
                    <div class="col-md-3">
                        <label><input type="radio"
                                      name="role" value="Moderator" {{$user->hasRole('moderator')?'checked':''}}>Модератор</label>
                    </div>
                    <div class="col-md-3">
                        <label><input type="radio"
                                      name="role" value="Admin" {{$user->hasRole('admin')?'checked':''}}>Администратор</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="username" class="control-label col-md-2">Имя пользователя</label>
                    <div class="col-md-9">
                        <input type="text" name="username" class="form-control" id="username"
                               placeholder="Введите имя пользователя"
                               value="{{ $user->username }}">
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
                               value="{{ $user->email }}">
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
                               placeholder="Новый пароль">
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
                               placeholder="Подтвердите новый пароль">
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
                               value="{{ $user->profile->name }}">
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
                               value="{{ $user->profile->surname }}">
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
                               value="{{ $user->profile->phone }}">
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
                                <option value="{{$country->id}}"
                                        @if($country->id==$user->profile->city->region->country_id) selected @endif>{!! $country->name !!}</option>
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
                            @foreach($regions as $region)
                                <option value="{{$region->id}}"
                                        @if($region->id==$user->profile->city->region_id) selected @endif>{!! $region->name !!}</option>
                            @endforeach
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
                            @foreach($cities as $city)
                                <option value="{{$city->id}}"
                                        @if($city->id==$user->profile->city_id) selected @endif>{!! $city->name !!}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="address" class="control-label col-md-2">Адрес</label>
                    <div class="col-md-9">
                        <input type="text" name="address" class="form-control" value="{{$user->profile->address}}"
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
                               value="{{$user->profile->postcode}}" id="postcode">
                        @if($errors->has('postcode'))
                            <div class="alert alert-danger">
                                <strong>{!! $errors->first('postcode') !!}</strong>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-offset-5 col-md-2">
                        <button type="submit" class="btn btn-primary btn-block">
                            <i class="fa fa-btn fa-user"></i> Изменить
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection