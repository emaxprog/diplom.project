@extends('layouts.app')
@section('content')
    <!-- pages-title-start -->
    <section class="contact-img-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="con-text">
                        <h2 class="page-title">Checkout</h2>
                        <p><a href="#">Home</a> | Checkout</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- pages-title-end -->
    <!-- checkout content section start -->
    <div class="checkout-area">
        <div class="container">
            @if(Auth::guest())
                <div class="row">
                    <div class="col-md-12">
                        <div class="coupon-accordion">
                            <h3>Returning customer? <span id="showcoupon3">Click here to login</span></h3>
                            <div id="checkout_coupon3" class="coupon-checkout-content">
                                <p>If you have shopped with us before, please enter your details in the boxes below. If
                                    you are a new customer, please proceed to the Billing & Shipping section.</p>
                                <div class="coupon-info top1">
                                    <form action="{{ route('login') }}" method="post">
                                        {{csrf_field()}}
                                        <p class="checkout-coupon top">
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
                                        <p class="checkout-coupon top-down">
                                            <label for="password" class="l-contact">
                                                Password
                                                <em>*</em>
                                            </label>
                                            <input id="password" type="password" class="form-control" name="password"
                                                   required>

                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                            @endif
                                        </p>
                                        <div class="cop-left">
                                            <input type="submit" value="login"/>
                                            <label class="inline">
                                                <input type="checkbox"
                                                       name="remember" {{ old('remember') ? 'checked' : '' }}>
                                                Remember me!
                                            </label>
                                        </div>
                                        <p class="lost_password">
                                            <a href="{{ route('password.request') }}">Lost your password?</a>
                                        </p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="row">
                    <div class="col-md-12">
                        <div class="coupon-accordion res">
                            <h3>Have a coupon? <span id="showcoupon">Click here to enter your code</span></h3>
                            <div id="checkout_coupon" class="coupon-checkout-content tnm">
                                <div class="coupon-info">
                                    <form action="#">
                                        <p class="checkout-coupon res">
                                            <input type="text" placeholder="Coupon code"/>
                                            <input type="submit" value="Apply Coupon"/>
                                        </p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-7 col-sm-12">
                        <div class="text">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active ano complete">
                                    <a href="#home" aria-controls="home" role="tab" data-toggle="tab" id="home-tab"></a>
                                    <span>Address</span>
                                </li>
                                <li role="presentation" class="ano ">
                                    <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab" id="payment-tab"></a>
                                    <span>Payment</span>
                                </li>
                                <li role="presentation" class="ano la">
                                    <a href="#message" aria-controls="message" role="tab" data-toggle="tab" id="complete-tab"></a>
                                    <span>Complete</span>
                                </li>
                            </ul>
                            <form action="{{route('order.store')}}" method="post">
                            {{csrf_field()}}
                            <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="home">

                                        <div class="row">
                                            <div class="checkbox-form">
                                                <div class="col-md-12">
                                                    <h3 class="checkbox9">Информация о клиенте</h3>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="di-na bs">
                                                        <label class="l-contact">
                                                            First Name
                                                            <em>*</em>
                                                        </label>
                                                        <input class="form-control" type="text" required="" name="name"
                                                               value="{{$user->profile->name}}" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="di-na bs">
                                                        <label class="l-contact">
                                                            Last Name
                                                            <em>*</em>
                                                        </label>
                                                        <input class="form-control" type="text" required="" name="name"
                                                               value="{{$user->profile->surname}}" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="di-na bs">
                                                        <label class="l-contact">
                                                            Email Address
                                                            <em>*</em>
                                                        </label>
                                                        <input class="form-control" type="email" required="" name="name"
                                                               value="{{$user->email}}" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="di-na bs">
                                                        <label class="l-contact">
                                                            Phone
                                                            <em>*</em>
                                                        </label>
                                                        <input class="form-control" type="tel" required="" name="name"
                                                               value="{{$user->profile->phone}}" disabled>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        @foreach($user->profile->addresses as $address)
                                            <?php $i=0;?>
                                            <div class="row">
                                                <div class="checkbox-form">
                                                    <div id="showcoupon2" class="col-md-1">
                                                        <input id="address-{{$address->id}}" class="input-checkbox"
                                                               type="radio" name="address_id" value="{{$address->id}}" @if($i==0) checked @endif>
                                                    </div>
                                                    <div class="col-md-11">
                                                        <label for="address-{{$address->id}}"><h3>Адрес</h3></label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="country-select">
                                                            <label class="l-contact">
                                                                Country
                                                                <em>*</em>
                                                            </label>
                                                            <select class="email s-email s-wid" disabled>
                                                                <option>{{$address->city->region->country->name}}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label class="l-contact">
                                                            Address
                                                            <em>*</em>
                                                        </label>
                                                        <div class="di-na bs">
                                                            <input class="form-control" type="text" required=""
                                                                   name="name" placeholder="Street address"
                                                                   value="{{$address->address}}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="country-select">
                                                            <label class="l-contact">
                                                                District
                                                                <em>*</em>
                                                            </label>
                                                            <select class="email s-email s-wid" disabled>
                                                                <option>{{$address->city->region->name}}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="l-contact">
                                                            Town / City
                                                            <em>*</em>
                                                        </label>
                                                        <div class="di-na bs">
                                                            <input class="form-control" type="text" required=""
                                                                   name="name" value="{{$address->city->name}}"
                                                                   disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="di-na bs">
                                                            <label class="l-contact">
                                                                Postcode / ZIP
                                                                <em>*</em>
                                                            </label>
                                                            <input class="form-control" type="text" required=""
                                                                   name="name" value="{{$address->postcode}}" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php $i++;?>
                                        @endforeach
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div id="showcoupon2" class="col-md-1">
                                                    <input id="address-new" class="input-checkbox" type="radio"
                                                           name="address_id" value="new">
                                                </div>
                                                <div class="col-md-11">
                                                    <label for="address-new"><h3>Другой адрес</h3></label>
                                                </div>
                                            </div>
                                            <div id="checkout_coupon2" class="coupon-checkout-content2">
                                                <div class="checkbox-form">
                                                    <div class="col-md-12">
                                                        <div class="country-select">
                                                            <label class="l-contact">
                                                                Country
                                                                <em>*</em>
                                                            </label>
                                                            <select name="country" class="email s-email s-wid" id="country">
                                                                <option value="0">Выбрать...</option>
                                                                @foreach($countries as $country)
                                                                    <option value="{{$country->id}}">{!! $country->name !!}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label class="l-contact">
                                                            Address
                                                            <em>*</em>
                                                        </label>
                                                        <div class="di-na bs">
                                                            <input type="text" name="address" class="form-control"
                                                                   value="{{old('address')}}"
                                                                   placeholder="Пример: ул.Шолохова 156а" id="address">

                                                            @if ($errors->has('address'))
                                                                <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label class="l-contact">
                                                            Town / City
                                                            <em>*</em>
                                                        </label>
                                                        <select name="city" class="email s-email s-wid depdrop" id="city"
                                                                data-depends="[&quot;country&quot;,&quot;region&quot;]"
                                                                data-url="{{route('location.cities')}}"
                                                                data-placeholder="Выбрать...">
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="country-select">
                                                            <label class="l-contact">
                                                                District
                                                                <em>*</em>
                                                            </label>
                                                            <select name="region" class="email s-email s-wid depdrop"
                                                                    id="region"
                                                                    data-depends="[&quot;country&quot;]"
                                                                    data-url="{{route('location.regions')}}"
                                                                    data-placeholder="Выбрать...">
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="di-na bs">
                                                            <label class="l-contact">
                                                                Postcode / ZIP
                                                                <em>*</em>
                                                            </label>
                                                            <input type="text" name="postcode" placeholder="Пример:346422"
                                                                   class="form-control"
                                                                   value="{{old('postcode')}}" id="postcode">
                                                            @if ($errors->has('postcode'))
                                                                <span class="help-block">
                                        <strong>{{ $errors->first('postcode') }}</strong>
                                    </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="di-na bs">
                                                            <label class="l-contact">
                                                                Сохранить адрес
                                                            </label>
                                                            <input type="checkbox" name="address_save" value="true">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="di-na bs">
                                                    <label class="l-contact">
                                                        Комментарий к заказу
                                                    </label>
                                                    <textarea class="input-text "
                                                              placeholder="Notes about your order, e.g. special notes for delivery."
                                                              name="comment"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12 text-center">
                                                <p class="checkout-coupon">
                                                    <input type="submit" value="CONTINUE" onclick="return false;">
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="profile">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="top-check-text">
                                                    <div class="check-down">
                                                        <h3 class="checkbox9">Тип доставки</h3>
                                                    </div>
                                                    <p class="form-row form-row-wide">
                                                        <select name="delivery" class="form-control again">
                                                            @foreach($deliveries as $delivery)
                                                                <option value="{{$delivery->id}}">{!! $delivery->name !!}
                                                                    ({!! $delivery->price !!} руб.)
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </p>
                                                </div>
                                                <div class="top-check-text">
                                                    <div class="check-down">
                                                        <h3 class="checkbox9">Cпособ оплаты</h3>
                                                    </div>
                                                </div>
                                                <div class="all-payment">
                                                    <div class="all-paymet-border">
                                                        <div class="payment-method">
                                                            @foreach($payments as $payment)
                                                                <div class="pay-top sin-payment">
                                                                    <input id="payment_method_{{$payment->id}}"
                                                                           class="input-radio"
                                                                           type="radio" value="{{$payment->id}}"
                                                                           @if($payment->id==1) checked="checked" @endif
                                                                           name="payment">
                                                                    <label for="payment_method_{{$payment->id}}">{!! $payment->name !!}</label>
                                                                    <div class="payment_box payment_method_bacs">
                                                                        <p>{!! $payment->description !!}</p>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        <div class="form-row place-order">
                                                            <input class="button alt" type="submit" value="Place order">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="message">
                                        <div class="last-check">
                                            <h3 class="checkbox9">complete</h3>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    @endif
                    <div class="col-md-5 col-sm-12">
                        <div class="ro-checkout-summary">
                            <div class="ro-title">
                                <h3 class="checkbox9">ORDER SUMMARY</h3>
                            </div>
                            <div class="ro-body">
                                @foreach ($cart as $product)
                                    <div class="ro-item">
                                        <div class="ro-image">
                                            <a href="#">
                                                <img src="{{$product->options->image}}" alt="">
                                            </a>
                                        </div>
                                        <div>
                                            <div class="tb-beg">
                                                <a href="#">{{$product->name}}</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="ro-price">
                                                <span class="amount">{{$product->price}} руб.</span>
                                            </div>
                                            <div class="ro-quantity">
                                                <strong class="product-quantity">× {{$product->qty}}</strong>
                                            </div>
                                            <div class="product-total">
                                                <span class="amount total-price">{{$product->total}}
                                                    руб.</span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="ro-footer">
                                <div>
                                    <p>
                                        Subtotal
                                        <span>
                                            <span class="amount total-cost">{{$product->total}}
                                                руб.</span>
                                        </span>
                                    </p>
                                    <div class="ro-divide"></div>
                                </div>
                                <div class="shipping">
                                    <p> Shipping </p>
                                    <div class="ro-shipping-method">
                                        <p>
                                            Shipping Local Pickup (Free)
                                        </p>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="ro-divide"></div>
                                </div>
                                <div class="order-total">
                                    <p>
                                        Total
                                        <span>
                                            <strong>
                                                <span class="amount total-cost">{{$product->total}}
                                                    руб.</span>
                                            </strong>
                                        </span>
                                    </p>
                                </div>
                                <div>
                                    <p>
                                        Payment Due
                                        <span>
                                            <strong>
                                                <span class="amount total-cost">{{$product->total}}
                                                    руб.</span>
                                            </strong>
                                        </span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <!-- checkout  content section end -->
@endsection
