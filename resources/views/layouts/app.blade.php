<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Интернет-магазин</title>
    {{--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>--}}
    <script rel="script" type="text/javascript" src="/template/js/jQuery/jquery.cookie.js"></script>
    <link rel="stylesheet" type="text/css" href="css/main.min.css">
</head>
<body>
<header>
    <!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{route('home')}}">EmStorm</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">О компании</a>
                    </li>
                    <li>
                        <a href="#" onclick="return false" data-toggle="modal" data-target="#popup">Обратная связь</a>
                    </li>
                    <li>
                        <a href="#">Гарантия</a>
                    </li>
                </ul>
                {{--<p class="navbar-text"><i class="fa fa-phone fa-lg"></i> {!! $header->phone1 !!}</p>--}}
                {{--<p class="navbar-text"><i class="fa fa-phone fa-lg"></i> {!! $header->phone2 !!}</p>--}}
                <ul class="nav navbar-nav navbar-right">
                    @if(Auth::guest())
                        <li>
                            <a href="{{url('/login')}}"><i class="fa fa-lock fa-lg"></i> Войти</a>
                        </li>
                        <li>
                            <a href="{{url('/register')}}"><i class="fa fa-key fa-lg"></i> Регистрация</a>
                        </li>
                    @else
                        <li>
                            <a href="{{route('user.index')}}"><i class="fa fa-user fa-lg"></i> Личный кабинет</a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="fa fa-unlock fa-lg"></i> Выйти
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    @endif
                    <li>
                        <a href="{{route('basket')}}"><i class="fa fa-shopping-cart fa-lg"></i> Корзина <span
                                    class="baskets-counter badge"></span></a>
                    </li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>
</header>
<div class="content">
    <div class="container">
        @yield('content')
    </div>
</div>
<footer class="panel-footer" id="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h2>Навигация</h2>
                <nav>
                    <ul class="nav">
                        <li>
                            <a href="{{route('home')}}">Главная</a>
                        </li>
                        <li>
                            <a href="#">О компании</a>
                        </li>
                        <li>
                            <a href="#" onclick="return false" data-toggle="modal" data-target="#popup">Обратная
                                связь</a>
                        </li>
                        <li>
                            <a href="#">Гарантия</a>
                        </li>

                    </ul>
                </nav>
            </div>
            <div class="col-md-4">
                <h2>Способы оплаты</h2>
                <div class="payment-methods-img">
                    <img src="/template/images/site/oplata_icon.png" alt="Способы оплаты"
                         title="Способы оплаты">
                </div>
            </div>
            <div class="col-md-4 f-contacts">
                <h2>Контакты</h2>
                <ul class="list-unstyled">
                    {{--<li><i class="fa fa-phone fa-lg"></i> {!! $header->phone1 !!}</li>--}}
                    {{--<li><i class="fa fa-map-marker fa-lg"></i> {!! $header->address !!}</li>--}}
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <span>2016 &copy; Интернет-магазин EmStorm</span>
            </div>
        </div>
    </div>
</footer>
<div class="modal fade" role="dialog" aria-hidden="true" id="popup">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" aria-hidden="true" data-dismiss="modal">&times;</button>
                <h2>Обратная связь</h2>
            </div>
            <div class="modal-body">
                <form name="contact" id="feedback-form" method="post" class="form" action="/feedback"
                      onsubmit="return false">
                    <div class="form-group">
                        <label for="name">Ваше имя</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Введите имя"
                               tabindex="1">
                        <div class="text-danger error-name"></div>
                    </div>
                    <div class="form-group">
                        <label for="phone">Телефон</label>
                        <input type="text" name="phone" id="phone" class="form-control" placeholder="Введите телефон"
                               tabindex="2">
                        <div class="text-danger error-phone"></div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" class="form-control" placeholder="Введите Email"
                               tabindex="3">
                        <div class="text-danger error-email"></div>
                    </div>
                    <div class="form-group">
                        <label for="message">Сообщение</label>
                        <textarea name="message" id="message" rows="5" class="form-control"
                                  placeholder="Введите сообщение"
                                  tabindex="4"></textarea>
                        <div class="text-danger error-message"></div>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" name="submitbtn" class="btn btn-primary"
                                id="feedback-btn">Отправить
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script rel="script" type="text/javascript" src="js/scripts.min.js"></script>

</body>
</html>