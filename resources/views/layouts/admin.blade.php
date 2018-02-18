<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" id="csrf-token" content="{{csrf_token()}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Интернет-магазин</title>
    <link rel="stylesheet" href="/flat/css/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/css/main.admin.min.css">
    <link rel="stylesheet" type="text/css" href="/flat/css/flat-ui.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <script src="/flat/js/vendor/jquery.min.js"></script>
    <script rel="script" type="text/javascript" src="/js/scripts.min.js"></script>
    <script rel="script" type="text/javascript" src="/js/functions.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
            <a class="navbar-brand" href="{{route('admin')}}">EmStorm</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="{{route('user.index')}}"><i class="far fa-user fa-lg"></i> Пользователи</a></li>
                <li><a href="{{route('product.index')}}"><i class="far fa-clipboard fa-lg"></i> Товары</a></li>
                <li><a href="{{route('category.index')}}"><i class="far fa-folder-open fa-lg"></i> Категории</a></li>
                <li><a href="{{route('order.index')}}"><i class="far fa-list-alt fa-lg"></i> Заказы</a></li>
                <li><a href="{{route('afisha.index')}}"><i class="far fa-images fa-lg"></i> Афишы</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        На сайт <i class="far fa-arrow-alt-circle-right fa-lg"></i>
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