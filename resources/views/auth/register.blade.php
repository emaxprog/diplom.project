@extends('layouts.app')

@section('content')
    <!-- pages-title-start -->
    <section class="contact-img-area">
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
    <!-- quick view start -->
    <div class="quick-view modal fade in" id="quick-view">
        <div class="container">
            <div class="row">
                <div id="view-gallery" class="owl-carousel product-slider owl-theme">
                    <div class="col-xs-12">
                        <div class="d-table">
                            <div class="d-tablecell">
                                <div class="modal-dialog">
                                    <div class="main-view modal-content">
                                        <div class="modal-footer" data-dismiss="modal">
                                            <span>x</span>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-5">
                                                <div class="quick-image">
                                                    <div class="single-quick-image tab-content text-center">
                                                        <div class="tab-pane  fade in active" id="sin-pro-1">
                                                            <img src="img/quick-view/10.jpg" alt=""/>
                                                        </div>
                                                        <div class="tab-pane fade in" id="sin-pro-2">
                                                            <img src="img/quick-view/10.jpg" alt=""/>
                                                        </div>
                                                        <div class="tab-pane fade in" id="sin-pro-3">
                                                            <img src="img/quick-view/10.jpg" alt=""/>
                                                        </div>
                                                        <div class="tab-pane fade in" id="sin-pro-4">
                                                            <img src="img/quick-view/10.jpg" alt=""/>
                                                        </div>
                                                    </div>
                                                    <div class="quick-thumb">
                                                        <div class="nav nav-tabs">
                                                            <ul>
                                                                <li><a data-toggle="tab" href="#sin-pro-1"> <img
                                                                                src="img/quick-view/10.jpg"
                                                                                alt="quick view"/> </a></li>
                                                                <li><a data-toggle="tab" href="#sin-pro-2"> <img
                                                                                src="img/quick-view/10.jpg"
                                                                                alt="quick view"/> </a></li>
                                                                <li><a data-toggle="tab" href="#sin-pro-3"> <img
                                                                                src="img/quick-view/10.jpg"
                                                                                alt="quick view"/> </a></li>
                                                                <li><a data-toggle="tab" href="#sin-pro-4"> <img
                                                                                src="img/quick-view/10.jpg"
                                                                                alt="quick view"/> </a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-7">
                                                <div class="quick-right">
                                                    <div class="quick-right-text">
                                                        <h3><strong>product name title</strong></h3>
                                                        <div class="rating">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-half-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <a href="#">06 Review</a>
                                                            <a href="#">Add review</a>
                                                        </div>
                                                        <div class="amount">
                                                            <h4>$65.00</h4>
                                                        </div>
                                                        <p>Lorem Ipsum is simply dummy text of the printing and
                                                            typesetting industry. Lorem Ipsum has beenin the stand ard
                                                            dummy text ever since the 1500s, when an unknown printer
                                                            took a galley of type and scrames bled it make a type
                                                            specimen book. It has survived not only five centuries, but
                                                            also the leap into electronic type setting, remaining
                                                            essentially unchanged It was popularised in the 1960s with
                                                            the release of Letraset sheets containing Lorem Ipsum
                                                            passages.</p>
                                                        <div class="row m-p-b">
                                                            <div class="col-sm-12 col-md-6">
                                                                <div class="por-dse responsive-strok clearfix">
                                                                    <ul>
                                                                        <li><span>Availability</span><strong>:</strong>
                                                                            In stock
                                                                        </li>
                                                                        <li><span>Condition</span><strong>:</strong> New
                                                                            product
                                                                        </li>
                                                                        <li><span>Category</span><strong>:</strong> <a
                                                                                    href="#">Men</a> <a
                                                                                    href="#">Fashion</a> <a href="#">Shirt</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-6">
                                                                <div class="por-dse color">
                                                                    <ul>
                                                                        <li><span>color</span><strong>:</strong> <a
                                                                                    href="#">Red</a> <a
                                                                                    href="#">Green</a> <a
                                                                                    href="#">Blue</a> <a
                                                                                    href="#">Orange</a></li>
                                                                        <li><span>size</span><strong>:</strong> <a
                                                                                    href="#">SL</a> <a href="#">SX</a>
                                                                            <a href="#">M</a> <a href="#">XL</a></li>
                                                                        <li><span>tag</span><strong>:</strong> <a
                                                                                    href="#">Men</a> <a
                                                                                    href="#">Fashion</a> <a href="#">Shirt</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="dse-btn">
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-6">
                                                                    <div class="por-dse clearfix">
                                                                        <ul>
                                                                            <li class="share-btn qty clearfix"><span>quantity</span>
                                                                                <form action="#" method="POST">
                                                                                    <div class="plus-minus">
                                                                                        <a class="dec qtybutton">-</a>
                                                                                        <input type="text" value="02"
                                                                                               name="qtybutton"
                                                                                               class="plus-minus-box">
                                                                                        <a class="inc qtybutton">+</a>
                                                                                    </div>
                                                                                </form>
                                                                            </li>
                                                                            <li class="share-btn clearfix">
                                                                                <span>share</span>
                                                                                <a href="#"><i
                                                                                            class="fa fa-facebook"></i></a>
                                                                                <a href="#"><i
                                                                                            class="fa fa-twitter"></i></a>
                                                                                <a href="#"><i
                                                                                            class="fa fa-google-plus"></i></a>
                                                                                <a href="#"><i
                                                                                            class="fa fa-linkedin"></i></a>
                                                                                <a href="#"><i
                                                                                            class="fa fa-instagram"></i></a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-6">
                                                                    <div class="por-dse clearfix responsive-othre">
                                                                        <ul class="other-btn">
                                                                            <li><a href="#"><i class="fa fa-heart"></i></a>
                                                                            </li>
                                                                            <li><a href="#"><i
                                                                                            class="fa fa-refresh"></i></a>
                                                                            </li>
                                                                            <li><a href="#"><i
                                                                                            class="fa fa-envelope-o"></i></a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="por-dse add-to">
                                                                        <a href="#">add to cart</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- single-product item end -->
                    <div class="col-xs-12">
                        <div class="d-table">
                            <div class="d-tablecell">
                                <div class="modal-dialog">
                                    <div class="main-view modal-content">
                                        <div class="modal-footer" data-dismiss="modal">
                                            <span>x</span>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-5">
                                                <div class="quick-image">
                                                    <div class="single-quick-image tab-content text-center">
                                                        <div class="tab-pane  fade in active" id="sin-pro-5">
                                                            <img src="img/quick-view/10.jpg" alt=""/>
                                                        </div>
                                                        <div class="tab-pane fade in" id="sin-pro-6">
                                                            <img src="img/quick-view/10.jpg" alt=""/>
                                                        </div>
                                                        <div class="tab-pane fade in" id="sin-pro-7">
                                                            <img src="img/quick-view/10.jpg" alt=""/>
                                                        </div>
                                                        <div class="tab-pane fade in" id="sin-pro-8">
                                                            <img src="img/quick-view/10.jpg" alt=""/>
                                                        </div>
                                                    </div>
                                                    <div class="quick-thumb">
                                                        <div class="nav nav-tabs">
                                                            <ul>
                                                                <li><a data-toggle="tab" href="#sin-pro-5"> <img
                                                                                src="img/quick-view/10.jpg"
                                                                                alt="quick view"/> </a></li>
                                                                <li><a data-toggle="tab" href="#sin-pro-6"> <img
                                                                                src="img/quick-view/10.jpg"
                                                                                alt="quick view"/> </a></li>
                                                                <li><a data-toggle="tab" href="#sin-pro-7"> <img
                                                                                src="img/quick-view/10.jpg"
                                                                                alt="quick view"/> </a></li>
                                                                <li><a data-toggle="tab" href="#sin-pro-8"> <img
                                                                                src="img/quick-view/10.jpg"
                                                                                alt="quick view"/> </a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-7">
                                                <div class="quick-right">
                                                    <div class="quick-right-text">
                                                        <h3><strong>product name title</strong></h3>
                                                        <div class="rating">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-half-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <a href="#">06 Review</a>
                                                            <a href="#">Add review</a>
                                                        </div>
                                                        <div class="amount">
                                                            <h4>$65.00</h4>
                                                        </div>
                                                        <p>Lorem Ipsum is simply dummy text of the printing and
                                                            typesetting industry. Lorem Ipsum has beenin the stand ard
                                                            dummy text ever since the 1500s, when an unknown printer
                                                            took a galley of type and scrames bled it make a type
                                                            specimen book. It has survived not only five centuries, but
                                                            also the leap into electronic type setting, remaining
                                                            essentially unchanged It was popularised in the 1960s with
                                                            the release of Letraset sheets containing Lorem Ipsum
                                                            passages.</p>
                                                        <div class="row m-p-b">
                                                            <div class="col-sm-6">
                                                                <div class="por-dse">
                                                                    <ul>
                                                                        <li><span>Availability</span><strong>:</strong>
                                                                            In stock
                                                                        </li>
                                                                        <li><span>Condition</span><strong>:</strong> New
                                                                            product
                                                                        </li>
                                                                        <li><span>Category</span><strong>:</strong> <a
                                                                                    href="#">Men</a> <a
                                                                                    href="#">Fashion</a> <a href="#">Shirt</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="por-dse color">
                                                                    <ul>
                                                                        <li><span>color</span><strong>:</strong> <a
                                                                                    href="#">Red</a> <a
                                                                                    href="#">Green</a> <a
                                                                                    href="#">Blue</a> <a
                                                                                    href="#">Orange</a></li>
                                                                        <li><span>size</span><strong>:</strong> <a
                                                                                    href="#">SL</a> <a href="#">SX</a>
                                                                            <a href="#">M</a> <a href="#">XL</a></li>
                                                                        <li><span>tag</span><strong>:</strong> <a
                                                                                    href="#">Men</a> <a
                                                                                    href="#">Fashion</a> <a href="#">Shirt</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="dse-btn">
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <div class="por-dse">
                                                                        <ul>
                                                                            <li class="share-btn qty clearfix"><span>quantity</span>
                                                                                <form action="#" method="POST">
                                                                                    <div class="plus-minus">
                                                                                        <a class="dec qtybutton">-</a>
                                                                                        <input type="text" value="02"
                                                                                               name="qtybutton"
                                                                                               class="plus-minus-box">
                                                                                        <a class="inc qtybutton">+</a>
                                                                                    </div>
                                                                                </form>
                                                                            </li>
                                                                            <li class="share-btn clearfix">
                                                                                <span>share</span>
                                                                                <a href="#"><i
                                                                                            class="fa fa-facebook"></i></a>
                                                                                <a href="#"><i
                                                                                            class="fa fa-twitter"></i></a>
                                                                                <a href="#"><i
                                                                                            class="fa fa-google-plus"></i></a>
                                                                                <a href="#"><i
                                                                                            class="fa fa-linkedin"></i></a>
                                                                                <a href="#"><i
                                                                                            class="fa fa-instagram"></i></a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="por-dse clearfix">
                                                                        <ul class="other-btn">
                                                                            <li><a href="#"><i class="fa fa-heart"></i></a>
                                                                            </li>
                                                                            <li><a href="#"><i
                                                                                            class="fa fa-refresh"></i></a>
                                                                            </li>
                                                                            <li><a href="#"><i
                                                                                            class="fa fa-envelope-o"></i></a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="por-dse add-to">
                                                                        <a href="#">add to cart</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- single-product item end -->
                </div>
            </div>
        </div>
    </div>
    <!-- quick view end -->
@endsection