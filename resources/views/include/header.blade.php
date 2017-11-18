<!-- header section start -->
<header>
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-4">
                    <div class="left-header clearfix">
                        <ul>
                            <li><p><i class="fa fa-phone" aria-hidden="true"></i>(+880) 1910 000251</p></li>
                            <li class="hd-none"><p><i class="fa fa-clock-o" aria-hidden="true"></i>Mon-fri : 9:00-19:00</p></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-sm-8">
                    <div class="right-header">
                        <ul>
                            <li><a href="my-account.html"><i class="fa fa-user"></i>My account</a></li>
                            <li><a href="cart.html"><i class="fa fa-shopping-cart"></i>My cart</a></li>
                            <li><a href="wishlist.html"><i class="fa fa-heart"></i>My wishlist</a></li>
                            <li><a href="checkout.html"><i class="fa fa-usd"></i>Creck out</a></li>
                            <li><a href="login.html"><i class="fa fa-lock"></i>Login</a></li>
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
                        <a href="index.html"><img src="img/logo.png" alt="" /></a>
                    </div>
                </div>
                <div class="col-sm-10 col-md-10 col-xs-8 static">
                    <div class="all-manu-area">
                        <div class="mainmenu clearfix hidden-sm hidden-xs">
                            <nav>
                                <ul>
                                    <li><a href="index.html">Home</a>
                                        <ul>
                                            <li><a href="index.html">Home Version One</a></li>
                                            <li><a href="index-2.html">Home Version Two</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="shop.html">Shop</a>
                                        <div class="magamenu ">
                                            <ul class="again">
                                                <li class="single-menu colmd4">
                                                    <span>men’s wear</span>
                                                    <a href="#">shirts & top</a>
                                                    <a href="#">shoes</a>
                                                    <a href="#">dresses</a>
                                                    <a href="#">shwmwear</a>
                                                </li>
                                                <li class="single-menu colmd4">
                                                    <span>women’s wear</span>
                                                    <a href="#">shirts & tops</a>
                                                    <a href="#">shoes</a>
                                                    <a href="#">dresses</a>
                                                    <a href="#">shwmwear</a>
                                                </li>
                                                <li class="single-menu colmd4">
                                                    <span>accessories</span>
                                                    <a href="#">sunglasses</a>
                                                    <a href="#">leather</a>
                                                    <a href="#">belts</a>
                                                    <a href="#">rings</a>
                                                </li>
                                                <li class="single-menu colmd4 colmd5">
                                                    <a href="#">
                                                        <img alt="" src="img/maga-banner.png">
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    {{--<li><a href="shop.html">Lookbook</a></li>--}}
                                    {{--<li><a href="blog.html">Blog</a></li>--}}
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
                                    {{--<li><a href="about-us.html">About</a></li>--}}
                                    {{--<li><a href="contact.html">Contact</a></li>--}}



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
                            </nav>
                        </div>
                        <!-- mobile menu start -->
                        <div class="mobile-menu-area hidden-lg hidden-md">
                            <div class="mobile-menu">
                                <nav id="dropdown">
                                    <ul>
                                        <li><a href="index.html">Home</a>
                                            <ul>
                                                <li><a href="index.html">Home Version One</a></li>
                                                <li><a href="index-2.html">Home Version Two</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="shop.html">Shop</a>
                                            <ul>
                                                <li><a href="#">all products</a>
                                                    <ul>
                                                        <li>
                                                            <span>men’s wear</span>
                                                            <a href="#">shirts & top</a>
                                                            <a href="#">shoes</a>
                                                            <a href="#">dresses</a>
                                                            <a href="#">shwmwear</a>
                                                            <a href="#">jeans</a>
                                                            <a href="#">sweaters</a>
                                                            <a href="#">jacket</a>
                                                        </li>
                                                        <li>
                                                            <span>women’s wear</span>
                                                            <a href="#">shirts & tops</a>
                                                            <a href="#">shoes</a>
                                                            <a href="#">dresses</a>
                                                            <a href="#">shwmwear</a>
                                                            <a href="#">jeans</a>
                                                            <a href="#">sweaters</a>
                                                            <a href="#">jacket</a>
                                                        </li>
                                                        <li>
                                                            <span>accessories</span>
                                                            <a href="#">sunglasses</a>
                                                            <a href="#">leather</a>
                                                            <a href="#">belts</a>
                                                            <a href="#">rings</a>
                                                            <a href="#">sweaters</a>
                                                            <a href="#">persess</a>
                                                            <a href="#">bags</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">New products</a>
                                                    <ul>
                                                        <li>
                                                            <span>men’s wear</span>
                                                            <a href="#">shirts & top</a>
                                                            <a href="#">shoes</a>
                                                            <a href="#">jeans</a>
                                                            <a href="#">jacket</a>
                                                        </li>
                                                        <li>
                                                            <span>women’s wear</span>
                                                            <a href="#">shirts & tops</a>
                                                            <a href="#">shoes</a>
                                                            <a href="#">dresses</a>
                                                            <a href="#">shwmwear</a>
                                                            <a href="#">jeans</a>
                                                            <a href="#">sweaters</a>
                                                            <a href="#">jacket</a>
                                                        </li>
                                                        <li>
                                                            <span>accessories</span>
                                                            <a href="#">sunglasses</a>
                                                            <a href="#">leather</a>
                                                            <a href="#">belts</a>
                                                            <a href="#">sweaters</a>
                                                            <a href="#">persess</a>
                                                            <a href="#">bags</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">best sell</a>
                                                    <ul>
                                                        <li>
                                                            <span>men’s wear</span>
                                                            <a href="#">shirts & top</a>
                                                            <a href="#">shoes</a>
                                                            <a href="#">dresses</a>
                                                            <a href="#">shwmwear</a>
                                                            <a href="#">jeans</a>
                                                            <a href="#">sweaters</a>
                                                            <a href="#">jacket</a>
                                                        </li>
                                                        <li>
                                                            <span>accessories</span>
                                                            <a href="#">sunglasses</a>
                                                            <a href="#">leather</a>
                                                            <a href="#">belts</a>
                                                            <a href="#">rings</a>
                                                            <a href="#">sweaters</a>
                                                            <a href="#">persess</a>
                                                            <a href="#">bags</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">features products</a>
                                                    <ul>
                                                        <li>
                                                            <span>men’s wear</span>
                                                            <a href="#">shirts & top</a>
                                                            <a href="#">shoes</a>
                                                            <a href="#">sweaters</a>
                                                            <a href="#">jacket</a>
                                                        </li>
                                                        <li>
                                                            <span>women’s wear</span>
                                                            <a href="#">shirts & tops</a>
                                                            <a href="#">shoes</a>
                                                            <a href="#">dresses</a>
                                                            <a href="#">jacket</a>
                                                        </li>
                                                        <li>
                                                            <span>accessories</span>
                                                            <a href="#">sunglasses</a>
                                                            <a href="#">leather</a>
                                                            <a href="#">belts</a>
                                                            <a href="#">rings</a>
                                                            <a href="#">sweaters</a>
                                                            <a href="#">persess</a>
                                                            <a href="#">bags</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">popular products</a>
                                                    <ul>
                                                        <li>
                                                            <span>men’s wear</span>
                                                            <a href="#">shirts & top</a>
                                                            <a href="#">shoes</a>
                                                            <a href="#">dresses</a>
                                                            <a href="#">jeans</a>
                                                            <a href="#">sweaters</a>
                                                            <a href="#">jacket</a>
                                                        </li>
                                                        <li>
                                                            <span>women’s wear</span>
                                                            <a href="#">shirts & tops</a>
                                                            <a href="#">shoes</a>
                                                            <a href="#">dresses</a>
                                                        </li>
                                                        <li>
                                                            <span>accessories</span>
                                                            <a href="#">sunglasses</a>
                                                            <a href="#">leather</a>
                                                            <a href="#">belts</a>
                                                            <a href="#">rings</a>
                                                            <a href="#">sweaters</a>
                                                            <a href="#">persess</a>
                                                            <a href="#">bags</a>
                                                        </li>
                                                    </ul>
                                                </li>
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
                                <li class="re-icon tnm"><i class="fa fa-search" aria-hidden="true"></i>
                                    <form method="get" id="searchform" action="#">
                                        <input type="text" value="" name="s" id="ws" placeholder="Search product..." />
                                        <button type="submit"><i class="pe-7s-search"></i></button>
                                    </form>
                                </li>
                                <li><a href="cart.html"><i class="fa fa-shopping-cart"></i><span class="color1">2</span></a>
                                    <ul class="drop-cart">
                                        <li>
                                            <a href="cart.html"><img src="img/cart/1.png" alt="" /></a>
                                            <div class="add-cart-text">
                                                <p><a href="#">White Shirt</a></p>
                                                <p>$50.00</p>
                                                <span>Color : Blue</span>
                                                <span>Size   : SL</span>
                                            </div>
                                            <div class="pro-close">
                                                <i class="pe-7s-close"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="cart.html"><img src="img/cart/2.png" alt="" /></a>
                                            <div class="add-cart-text">
                                                <p><a href="#">White Shirt</a></p>
                                                <p>$50.00 x 2</p>
                                                <span>Color : Blue</span>
                                                <span>Size   : SL</span>
                                            </div>
                                            <div class="pro-close">
                                                <i class="pe-7s-close"></i>
                                            </div>
                                        </li>
                                        <li class="total-amount clearfix">
                                            <span class="floatleft">total</span>
                                            <span class="floatright"><strong>= $150.00</strong></span>
                                        </li>
                                        <li>
                                            <div class="goto text-center">
                                                <a href="cart.html"><strong>go to cart &nbsp;<i class="pe-7s-angle-right"></i></strong></a>
                                            </div>
                                        </li>
                                        <li class="checkout-btn text-center">
                                            <a href="checkout.html">Check out</a>
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