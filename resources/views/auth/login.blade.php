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
                        <form action="{{ route('login') }}" method="post">
                            {{csrf_field()}}
                            <p class="checkout-coupon top log a-an">
                                <label for="email" class="l-contact">
                                    Email Address
                                    <em>*</em>
                                </label>
                                <input id="email" type="email" class="form-control" name="email"
                                       value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </p>
                            <p class="checkout-coupon top-down log a-an">
                                <label for="password" class="l-contact">
                                    Password
                                    <em>*</em>
                                </label>
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </p>
                            <div class="forgot-password1">
                                <label class="inline2">
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    Remember me! <em>*</em>
                                </label>
                                <a class="forgot-password" href="{{ route('password.request') }}">Forgot Your
                                    password?</a>
                            </div>
                            <p class="login-submit5">
                                <input class="button-primary" type="submit" value="Login">
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
