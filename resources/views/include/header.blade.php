<!-- header section start -->
<header>
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-4">
                    <div class="left-header clearfix">
                        <ul>
                            <li><p><i class="fa fa-phone" aria-hidden="true"></i>(+880) 1910 000251</p></li>
                            <li class="hd-none"><p><i class="fa fa-clock-o" aria-hidden="true"></i>Mon-fri : 9:00-19:00
                                </p></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-sm-8">
                    <div class="right-header">
                        <ul>
                            <li><a href="{{route('cart.index')}}"><i class="fa fa-shopping-basket"></i>Моя корзина</a>
                            </li>
                            <li><a href="wishlist.html"><i class="fa fa-heart"></i>My wishlist</a></li>
                            @if(Auth::guest())
                                <li>
                                    <a href="{{url('/login')}}"><i class="fa fa-lock fa-lg"></i> Войти</a>
                                </li>
                                <li>
                                    <a href="{{url('/register')}}"><i class="fa fa-key fa-lg"></i> Регистрация</a>
                                </li>
                            @else
                                <li>
                                    <a href="{{route('profile.edit',Auth::user())}}"><i class="fa fa-user fa-lg"></i> Личный
                                        кабинет</a>
                                </li>
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fa fa-unlock fa-lg"></i> Выйти
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom header-bottom-one" id="sticky-menu">
        <div class="container relative">
            <div class="row">
                <div class="col-sm-2 col-md-2 col-xs-4">
                    <div class="logo">
                        <a href="index.html"><img src="img/logo.png" alt=""/></a>
                    </div>
                </div>
                <div class="col-sm-10 col-md-10 col-xs-8 static">
                    <div class="all-manu-area">
                        <div class="mainmenu clearfix hidden-sm hidden-xs">
                            @include('include/menu')
                        </div>
                        <!-- mobile menu start -->
                        <div class="mobile-menu-area hidden-lg hidden-md">
                            <div class="mobile-menu">
                                <nav id="dropdown">
                                    <ul>
                                        <li><a href="{{route('home')}}">Home</a>
                                            <ul>
                                                <li><a href="index.html">Home Version One</a></li>
                                                <li><a href="index-2.html">Home Version Two</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="shop.html">Shop</a>
                                            <ul>
                                                @foreach($categories as $category)
                                                    <li>
                                                        <span>{{$category->name}}</span>
                                                        <ul>
                                                            @foreach($category->subcategories as $subcategory)
                                                                <li>
                                                                    <a href="{{route('category',$subcategory)}}">{{$subcategory->name}}</a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li><a href="shop.html">Lookbook</a></li>
                                        <li><a href="blog.html">Blog</a></li>
                                        <li><a href="#">Pages</a>
                                            <ul>
                                                <li><a href="about-us.html">About</a></li>
                                                <li><a href="blog.html">Blog</a></li>
                                                <li><a href="blog-details.html">Blog Details</a></li>
                                                <li><a href="checkout.html">Checkout</a></li>
                                                <li><a href="contact.html">Contact</a></li>
                                                <li><a href="login.html">Login</a></li>
                                                <li><a href="my-account.html">My Account</a></li>
                                                <li><a href="shop.html">shop</a></li>
                                                <li><a href="shop-list.html">Shop List</a></li>
                                                <li><a href="shopping-cart.html">Shopping-Cart</a></li>
                                                <li><a href="single-product.html">Single Product</a></li>
                                                <li><a href="wishlist.html">Wishlist</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="about-us.html">About</a></li>
                                        <li><a href="contact.html">Contact</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <!-- mobile menu end -->
                        <div class="right-header re-right-header">
                            <ul>
                                <li class="re-icon tnm"><i class="fa fa-search fa-lg" aria-hidden="true"></i>
                                    <form method="get" id="searchform" action="#">
                                        <input type="text" value="" name="s" id="ws" placeholder="Search product..."/>
                                        <button type="submit"><i class="pe-7s-search"></i></button>
                                    </form>
                                </li>
                                <li><a href="{{route('cart.index')}}"><i class="fa fa-shopping-basket fa-lg"></i><span
                                                class="color1 baskets-counter"></span></a>
                                    <ul class="drop-cart">
                                        <li class="total-amount clearfix">
                                            <span class="floatleft">Общ. сумма:</span>
                                            <span class="floatright"><strong class="total-cost"></strong></span>
                                        </li>
                                        <li>
                                            <div class="goto text-center">
                                                <span data-url="{{route('cart.destroy')}}" id="clear-cart"><strong>Очистить корзину &nbsp;<i
                                                                class="fa fa-trash"></i></strong></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="goto text-center">
                                                <a href="{{route('cart.index')}}"><strong>Перейти в корзину &nbsp;<i
                                                                class="pe-7s-angle-right"></i></strong></a>
                                            </div>
                                        </li>
                                        <li class="checkout-btn text-center">
                                            <a href="{{route('order.create')}}">Оформить заказ</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- header section end -->