@extends('layouts.app')
@section('content')
    <!-- pages-title-start -->
    <section class="contact-img-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="con-text">
                        <h2 class="page-title">My Account</h2>
                        <p><a href="#">Home</a> | My Account</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- pages-title-end -->
    <!-- my account content section start -->
    <section class="collapse_area coll2">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="check">
                        <h2>My Account </h2>
                    </div>
                    <div class="faq-accordion">
                        <div class="panel-group pas7" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                        <a class="collapsed method" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">Edit your account information <i class="fa fa-caret-down"></i></a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false" >
                                    <div class="row">
                                        <div class="easy2">
                                            <h2>My Account Information</h2>
                                            <form class="form-horizontal" action="{{ route('profile.update',['id'=>$user->id])  }}" method="post">
                                                {{csrf_field()}}
                                                <input type="hidden" name="_method" value="PUT">
                                                <fieldset>
                                                    <legend>Your Personal Details</legend>
                                                    <div class="form-group">
                                                        <label for="username" class="col-sm-2 control-label">Имя пользователя</label>
                                                        <div class="col-sm-10">
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
                                                        <label for="email" class="col-sm-2 control-label">E-Mail</label>
                                                        <div class="col-sm-10">
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
                                                        <label for="name" class="col-sm-2 control-label">Имя</label>
                                                        <div class="col-sm-10">
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
                                                        <label for="surname" class="col-sm-2 control-label">Фамилия</label>
                                                        <div class="col-sm-10">
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
                                                        <label for="phone" class="col-sm-2 control-label">Телефон</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" name="phone" id="phone" placeholder="Введите телефон"
                                                                   value="{{ $user->profile->phone }}">
                                                            @if ($errors->has('phone'))
                                                                <div class="alert alert-danger">
                                                                    <strong>{{ $errors->first('phone') }}</strong>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <div class="buttons clearfix">
                                                    <div class="pull-left">
                                                        <a class="btn btn-default ce5" href="#">Back</a>
                                                    </div>
                                                    <div class="pull-right">
                                                        <input class="btn btn-primary ce5" type="submit" value="Continue">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingTwo">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Change your password   <i class="fa fa-caret-down"></i></a>
                                    </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="false" style="height: 0px;">
                                    <div class="row">
                                        <div class="easy2">
                                            <h2>Change Password</h2>
                                            <form class="form-horizontal" action="{{ route('profile.update',['id'=>$user->id])  }}" method="post">
                                                {{csrf_field()}}
                                                <input type="hidden" name="_method" value="PUT">
                                                <fieldset>
                                                    <legend>Your Password</legend>
                                                    <div class="form-group">
                                                        <label for="password" class="col-sm-2 control-label">Пароль</label>
                                                        <div class="col-sm-10">
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
                                                        <label for="password_confirmation" class="col-sm-2 control-label">Подтвердите пароль</label>
                                                        <div class="col-sm-10">
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
                                                    <input type="hidden" name="username" value="{{ $user->username }}">
                                                    <input type="hidden" name="email" value="{{ $user->email }}">
                                                    <input type="hidden" name="name" value="{{ $user->profile->name }}">
                                                    <input type="hidden" name="surname" value="{{ $user->profile->surname }}">
                                                    <input type="hidden" name="phone" value="{{ $user->profile->phone }}">
                                                </fieldset>
                                                <div class="buttons clearfix">
                                                    <div class="pull-left">
                                                        <a class="btn btn-default ce5" href="#">Back</a>
                                                    </div>
                                                    <div class="pull-right">
                                                        <input class="btn btn-primary ce5" type="submit" value="Continue">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="collap" href="{{route('cart.index')}}">Посмотреть корзину   <i class="fa fa-caret-down"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- my account  content section end -->
@endsection