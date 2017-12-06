@extends('layouts.app')

@section('content')
    <!-- pages-title-start -->
    <section class="contact-img-area" @if($afisha) style="background-image: url({{$afisha->path}});" @endif>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="con-text">
                        <h2 class="page-title">Login</h2>
                        <p><a href="{{route('home')}}">Home</a> | Login</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- pages-title-end -->
    <!-- login content section start -->
    <div class="login-area">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-xs-12">
                    <div class="tb-login-form ">
                        <h5 class="tb-title">Login</h5>
                        <p>Hello, Welcome your to account</p>
                        <div class="tb-social-login">
                            <a class="tb-facebook-login" href="#">
                                <i class="fa fa-facebook"></i>
                                Sign In With Facebook
                            </a>
                            <a class="tb-twitter-login res" href="#">
                                <i class="fa fa-twitter"></i>
                                Sign In With Twitter
                            </a>
                        </div>
                        <form  action="{{url('/register')}}"  method="post">{{csrf_field()}}
                            <p class="checkout-coupon top log a-an">
                                <label for="username" class="l-contact">
                                    Имя пользователя
                                    <em>*</em>
                                </label>
                                <input type="text" name="username" class="form-control" id="username"
                                       placeholder="Введите имя пользователя"
                                       value="{{ old('username') }}">

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </p>
                            <p class="checkout-coupon top log a-an">
                                <label for="email" class="l-contact">
                                    Email Address
                                    <em>*</em>
                                </label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Введите Email"
                                       value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </p>
                            <p class="checkout-coupon top-down log a-an">
                                <label for="password" class="l-contact">
                                    Пароль
                                    <em>*</em>
                                </label>
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </p>
                            <p class="checkout-coupon top log a-an">
                                <label for="password_confirmation" class="l-contact">
                                    Подтвердите пароль
                                    <em>*</em>
                                </label>
                                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation"
                                       placeholder="Подтвердите пароль">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </p>
                            <p class="checkout-coupon top log a-an">
                                <label for="name" class="l-contact">
                                    Имя
                                    <em>*</em>
                                </label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Введите имя"
                                       value="{{ old('name') }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </p>
                            <p class="checkout-coupon top log a-an">
                                <label for="surname" class="l-contact">
                                    Фамилия
                                    <em>*</em>
                                </label>
                                <input type="text" class="form-control" name="surname" id="surname" placeholder="Введите фамилию"
                                       value="{{ old('surname') }}">

                                @if ($errors->has('surname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('surname') }}</strong>
                                    </span>
                                @endif
                            </p>
                            <p class="checkout-coupon top log a-an">
                                <label for="phone" class="l-contact">
                                    Телефон
                                    <em>*</em>
                                </label>
                                <input type="text" class="form-control" name="phone" id="phone" placeholder="Введите телефон"
                                       value="{{ old('phone') }}">

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </p>
                            <p class="checkout-coupon top log a-an">
                                <label class="l-contact">
                                    Страна
                                    <em>*</em>
                                </label>
                                <select name="country" class="form-control" id="country">
                                    <option value="0">Выбрать...</option>
                                    @foreach($countries as $country)
                                        <option value="{{$country->id}}">{!! $country->name !!}</option>
                                    @endforeach
                                </select>
                            </p>
                            <p class="checkout-coupon top log a-an">
                                <label class="l-contact">
                                    Регион
                                    <em>*</em>
                                </label>
                                <select name="region" class="form-control depdrop" id="region"
                                        data-depends="[&quot;country&quot;]"
                                        data-url="{{route('location.regions')}}"
                                        data-placeholder="Выбрать...">
                                </select>
                            </p>
                            <p class="checkout-coupon top log a-an">
                                <label class="l-contact">
                                    Город
                                    <em>*</em>
                                </label>
                                <select name="city" class="form-control depdrop" id="city"
                                        data-depends="[&quot;country&quot;,&quot;region&quot;]"
                                        data-url="{{route('location.cities')}}"
                                        data-placeholder="Выбрать...">
                                </select>
                            </p>
                            <p class="checkout-coupon top log a-an">
                                <label for="address"  class="l-contact">
                                    Адрес
                                    <em>*</em>
                                </label>
                                <input type="text" name="address" class="form-control" value="{{old('address')}}"
                                       placeholder="Пример: ул.Шолохова 156а" id="address">

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </p>
                            <p class="checkout-coupon top log a-an">
                                <label for="postcode" class="l-contact">
                                    Почтовый индекс
                                    <em>*</em>
                                </label>
                                <input type="text" name="postcode" placeholder="Пример:346422" class="form-control"
                                       value="{{old('postcode')}}" id="postcode">

                                @if ($errors->has('postcode'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('postcode') }}</strong>
                                    </span>
                                @endif
                            </p>
                            <p class="login-submit5">
                                <input class="button-primary" type="submit" value="Регистрация">
                            </p>
                        </form>
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="tb-login-form res">
                        <h5 class="tb-title">SignUp today and you'll be able to:</h5>
                        <div class="tb-info-login ">
                            <ul>
                                <li>Speed your way through the checkout.</li>
                                <li>Track your orders easily.</li>
                                <li>Keep a record of all your purchases.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- login  content section end -->
@endsection