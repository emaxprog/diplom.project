<nav>
    <ul>
        <li><a href="{{route('home')}}">Главная</a>
            <ul>
                <li><a href="index.html">Home Version One</a></li>
                <li><a href="index-2.html">Home Version Two</a></li>
            </ul>
        </li>
        <li><a href="{{route('catalog')}}">Каталог</a>
            <div class="magamenu ">
                <ul class="again">
                    @foreach($categories as $category)
                        <li class="single-menu colmd4">
                            <span>{{$category->name}}</span>
                            @foreach($category->subcategories as $subcategory)
                                <a href="{{route('category',$subcategory)}}">{{$subcategory->name}}</a>
                            @endforeach
                        </li>
                        <li class="single-menu colmd4 colmd5">
                            <a href="#">
                                <img alt="" src="img/maga-banner.png">
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </li>
        <li><a href="shop.html">Lookbook</a></li>
        <li><a href="blog.html">Blog</a></li>
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
        {{--<li><a href="about-us.html">About</a></li>--}}
        {{--<li><a href="contact.html">Contact</a></li>--}}
    </ul>
</nav>