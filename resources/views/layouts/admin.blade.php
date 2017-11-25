<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" id="csrf-token" content="{{csrf_token()}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Интернет-магазин</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">    <link rel="stylesheet" type="text/css" href="/css/admin.min.css">
    <link rel="stylesheet" type="text/css" href="/css/main.admin.min.css">
    <script rel="script" type="text/javascript" src="/js/scripts.min.js"></script>
    <script rel="script" type="text/javascript" src="/js/functions.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-inverse fixed-top" role="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{route('product.index')}}">EmStorm</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="{{route('user.index')}}"><i class="fa fa-gamepad fa-lg"></i>Пользователи</a></li>
                <li><a href="{{route('product.index')}}"><i class="fa fa-gamepad fa-lg"></i>Товары</a></li>
                <li><a href="{{route('category.index')}}"><i class="fa fa-gamepad fa-lg"></i>Категории</a></li>
                <li><a href="{{route('order.index')}}"><i class="fa fa-gamepad fa-lg"></i>Заказы</a></li>
                <li><a href="{{route('afisha.index')}}"><i class="fa fa-gamepad fa-lg"></i>Афишы</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out fa-lg"></i> На сайт
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<div class="content">
    <div class="container">
        @yield('content')
    </div>
</div>
<footer>
</footer>
</body>
</html>