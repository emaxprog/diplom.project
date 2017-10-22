<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" id="csrf-token" content="{{csrf_token()}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{--<link rel="icon" type="image/x-icon" href="{{$header->favicon}}">--}}
    <title>Интернет-магазин</title>
    <link rel="icon" type="image/x-icon" href="/upload/logotype/favicon.ico">


    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
    <!-- if using RTL (Right-To-Left) orientation, load the RTL CSS file after fileinput.css by uncommenting below -->
    <!-- link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/css/fileinput-rtl.min.css" media="all" rel="stylesheet" type="text/css" /-->
    <!-- optionally uncomment line below if using a theme or icon set like font awesome (note that default icons used are glyphicons and `fa` theme can override it) -->
    <!-- link https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css media="all" rel="stylesheet" type="text/css" /-->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <!-- piexif.min.js is only needed for restoring exif data in resized images and when you
        wish to resize images before upload. This must be loaded before fileinput.min.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/plugins/piexif.min.js" type="text/javascript"></script>
    <!-- sortable.min.js is only needed if you wish to sort / rearrange files in initial preview.
        This must be loaded before fileinput.min.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/plugins/sortable.min.js" type="text/javascript"></script>
    <!-- purify.min.js is only needed if you wish to purify HTML content in your preview for
        HTML files. This must be loaded before fileinput.min.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/plugins/purify.min.js" type="text/javascript"></script>
    <!-- popper.min.js below is needed if you use bootstrap 4.x. You can also use the bootstrap js
       3.3.x versions without popper.min.js. -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <!-- bootstrap.min.js below is needed if you wish to zoom and preview file content in a detail modal
        dialog. bootstrap 4.x is supported. You can also use the bootstrap js 3.3.x versions. -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- the main fileinput plugin file -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/fileinput.min.js"></script>
    <!-- optionally uncomment line below for loading your theme assets for a theme like Font Awesome (`fa`) -->
    <!-- script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/themes/fa/theme.min.js"></script -->
    <!-- optionally if you need translation for your language then include  locale file as mentioned below -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/locales/LANG.js"></script>


    <link rel="stylesheet" type="text/css" href="/template/styles/font-awesome-4.6.3/css/font-awesome.min.css">
    {{--<link rel="stylesheet" type="text/css" href="/template/styles/css/styles.css">--}}
    {{--<script rel="script" type="text/javascript" src="/template/js/jQuery/jquery-3.1.1.min.js"></script>--}}
    <link rel="stylesheet" type="text/css" href="/template/js/jquery-ui-1.12.0.custom/jquery-ui.css">
    <script rel="script" type="text/javascript" src="/template/js/jquery-ui-1.12.0.custom/jquery-ui.min.js"></script>
    <link href="/template/js/select2/dist/css/select2.min.css" rel="stylesheet" />
    <script src="/template/js/select2/dist/js/select2.min.js"></script>
    <script rel="script" type="text/javascript" src="/template/js/dependent-dropdown/js/dependent-dropdown.js"></script>
    <link href="/template/js/dependent-dropdown/css/dependent-dropdown.min.css" media="all" rel="stylesheet" type="text/css" />
    {{--<script rel="script" type="text/javascript" src="/template/js/uploadProducts.js"></script>--}}
    <script rel="script" type="text/javascript" src="/template/js/functions.js"></script>


    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <script rel="script" type="text/javascript" src="/assets/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="/styles/css/styles.css">
</head>
<body>
<header>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
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
                    <li><a href="{{route('afisha.edit')}}"><i class="fa fa-gamepad fa-lg"></i>Афиша</a></li>
                    <li><a href="{{route('header.edit')}}"><i class="fa fa-gamepad fa-lg"></i>Шапка</a></li>
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
</header>
<div class="content">
    <div class="container">
        @yield('content')
    </div>
</div>
<footer>
</footer>
</body>
</html>