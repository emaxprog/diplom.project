@extends('layouts.app')
@section('content')
    <!-- pages-title-start -->
    <section class="contact-img-area" @if(isset($afisha)) style="background-image: url({{$afisha->path}});" @endif>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="con-text">
                        <h2 class="page-title">Shop</h2>
                        <p><a href="#">Home</a> | shop</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- pages-title-end -->
    <!-- shop-style content section start -->
    <section class="pages products-page section-padding-top">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-lg-3 col-sm-12">
                    <form name="form-range-price" id="form-selection" method="get" class="form" role="form">
                        <div class="all-shop-sidebar">
                            <div class="top-shop-sidebar">
                                <h3 class="wg-title">SHOP BY</h3>
                            </div>
                            <div class="shop-one">
                                <h3 class="wg-title2">Our Brand</h3>
                                <ul class="product-categories">
                                    @foreach ($manufacturers as $manufacturer)
                                        <li class="cat-item">
                                            <label>
                                                <input type="checkbox" class="checkbox" name="manufacturers[]"
                                                       id="manufacturer-{{$manufacturer->id}}"
                                                       value="{{$manufacturer->id}}"
                                                @if(isset($selectedManufacturersIds))
                                                    @if(in_array($manufacturer->id,$selectedManufacturersIds)){{' checked'}}
                                                            @endif
                                                        @endif>
                                                {{$manufacturer->name}}
                                            </label>
                                            <span class="count">(1)</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="shop-one re-shop-one">
                                <h3 class="wg-title2">Choose Price</h3>
                                <div class="widget shop-filter">
                                    <div class="info_widget">
                                        <div class="price_filter">
                                            <div id="slider-range"></div>
                                            <div id="amount">
                                                <input type="text" name="first_price" class="first_price"
                                                       value="{{$firstPrice}}" readonly/>
                                                <input type="text" name="last_price" class="last_price"
                                                       value="{{$lastPrice}}" readonly/>
                                                <button class="button-shop" type="submit" id="btn-selection"><i
                                                            class="fa fa-search search-icon"
                                                            formaction="{{\Illuminate\Support\Facades\Request::fullUrl()}}"></i>
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="shop-one re-shop-one">
                                <h3 class="wg-title2">Choose Color</h3>
                                <ul class="product-categories">
                                    <li class="cat-item cat-item-11">
                                        <a href="#">Black</a>
                                        <span class="count">(1)</span>
                                    </li>
                                    <li class="cat-item cat-item-8">
                                        <a href="#">Orange</a>
                                        <span class="count">(1)</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="top-shop-sidebar sim">
                                <h3 class="wg-title">Compare Products</h3>
                                <ul class="products-list">
                                    <li class="cat-item cat-item-11">No products to compare</li>
                                </ul>
                                <a class="clear-all" href="#">Clear all</a>
                                <a class="blog8" href="#">Compare</a>
                            </div>
                            <div class="top-shop-sidebar sim2">
                                <h3 class="wg-title">Community Pool</h3>
                            </div>
                            <div class="shop-one">
                                <ul class="product-categories">
                                    <li class="cat-item cat-item-11">
                                        <a href="#">Black</a>
                                        <span class="count">(1)</span>
                                    </li>
                                    <li class="cat-item cat-item-8">
                                        <a href="#">Orange</a>
                                        <span class="count">(1)</span>
                                    </li>
                                </ul>
                            </div>
                            @if(!empty($popularProducts))
                                <div class="top-shop-sidebar an-shop">
                                    <h3 class="wg-title">BEST SELLER</h3>
                                    <ul>
                                        @foreach($popularProducts as $popularProduct)
                                            <li class="b-none">
                                                <div class="tb-recent-thumbb">
                                                    <a href="{{route('product.show',$popularProduct)}}">
                                                        <img class="attachment"
                                                             src="{{$popularProduct->imagePreview->path}}"
                                                             alt="{{$popularProduct->name}}">
                                                    </a>
                                                </div>
                                                <div class="tb-recentb">
                                                    <div class="tb-beg">
                                                        <a href="{{route('product.show',$popularProduct)}}">{{$popularProduct->name}}</a>
                                                    </div>
                                                    <div class="tb-product-price font-noraure-3">
                                                        <span class="amount">{{$popularProduct->price}}</span>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @include('include/sections/sidebar',['afisha' => $afishaSidebar])
                        </div>
                    </form>
                </div>
                <div class="col-md-8 col-lg-9 col-sm-12">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="features-tab">
                                <!-- Nav tabs -->
                                <div class="shop-all-tab">
                                    <div class="two-part">
                                        <ul class="nav tabs" role="tablist">
                                            <li class="vali">View as:</li>
                                            <li role="presentation" class="active"><a href="#home" aria-controls="home"
                                                                                      role="tab" data-toggle="tab"><i
                                                            class="fa fa-th-large"></i></a></li>
                                            <li role="presentation"><a href="#profile" aria-controls="profile"
                                                                       role="tab" data-toggle="tab"><i
                                                            class="fa fa-align-justify"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="re-shop">
                                        <form action="{{\Illuminate\Support\Facades\Request::fullUrl()}}"
                                              name="form-range-price" id="form-sort" method="get">
                                            <div class="sort-by">
                                                <div class="shop6">
                                                    <label>Sort By :</label>
                                                    <select name="sort_by">
                                                        <option value="">Default sorting</option>
                                                        <option value="">Sort by popularity</option>
                                                        <option value="">Sort by average rating</option>
                                                        <option value="">Sort by newness</option>
                                                        <option value="">Sort by price: low to high</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="shop5">
                                                <label>Show :</label>
                                                <select name="show_by">
                                                    <option value="12">12</option>
                                                    <option value="24">24</option>
                                                    <option value="36">36</option>
                                                </select>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="home">
                                        <div class="row">
                                            <div class="shop-tab">
                                            @foreach ($products as $product)
                                                <!-- single-product start -->
                                                    <div class="col-md-4 col-lg-4 col-sm-6">
                                                        <div class="single-product">
                                                            <div class="product-img">
                                                                <div class="pro-type">
                                                                    @if ($product->is_new)
                                                                        <span>new</span>
                                                                    @endif
                                                                </div>
                                                                <a href="{{route('product.show',$product)}}">
                                                                    <img src="{{$product->imagePreview->path}}"
                                                                         alt="Product Title"
                                                                         id="product-img-{{$product->id}}"/>
                                                                </a>
                                                            </div>
                                                            <div class="product-dsc">
                                                                <h3><a href="{{route('product.show',$product)}}">{{$product->name}}</a></h3>
                                                                <div class="star-price">
                                                                    <span class="price-left">{{$product->price}}
                                                                        руб.</span>
                                                                    <span class="star-right">
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star-half-o"></i>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="actions-btn">
                                                                <a href="{{route('product.show',$product)}}"
                                                                   data-toggle="tooltip"
                                                                   data-placement="top"
                                                                   data-trigger="hover"
                                                                   data-original-title="View"
                                                                ><i class="fa fa-eye"></i></a>
                                                                <a data-placement="top" data-toggle="tooltip" href="#"
                                                                   data-original-title="Add To Wishlist"><i
                                                                            class="fa fa-heart"></i></a>
                                                                <a title="" data-placement="top" data-toggle="tooltip"
                                                                   href="#"
                                                                   data-original-title="Compare"><i
                                                                            class="fa fa-retweet"></i></a>
                                                                <a class="buy-btn" onclick="return false"
                                                                  title="Add To Cart"
                                                                   data-toggle="tooltip"
                                                                   data-placement="top"
                                                                   data-id="{{$product->id}}"
                                                                   data-name="{{$product->name}}"
                                                                   data-price="{{$product->price}}"
                                                                   data-url="{{route('product.show',$product)}}">
                                                                    <i class="fa fa-shopping-cart"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- single-product end -->
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="profile">
                                        <div class="row">
                                            @foreach ($products as $product)
                                                <div class="li-item">
                                                    <div class="col-md-4 col-sm-4">
                                                        <div class="tb-product-item-inner tb2 pct-last">
                                                            @if ($product->is_new)
                                                                <div class="pro-type">
                                                                    <span>new</span>
                                                                </div>
                                                            @endif
                                                            <div class="re-img">
                                                                <a href="{{route('product.show',$product)}}"><img
                                                                            src="{{$product->imagePreview->path}}"
                                                                            alt="Product Title"
                                                                            id="product-img-{{$product->id}}"/></a>
                                                            </div>
                                                            <div class="actions-btn">
                                                                <a href="{{route('product.show',$product)}}" data-placement="top"
                                                                   data-trigger="hover">
                                                                    <i class="fa fa-eye"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 col-sm-8">
                                                        <div class="f-fix">
                                                            <div class="tb-beg">
                                                                <a href="{{route('product.show',$product)}}">{{$product->name}}</a>
                                                            </div>
                                                            <div class="tb-product-wrap-price-rating">
                                                                <div class="tb-product-price font-noraure-3">
                                                                <span class="amount2 ana">{{$product->price}}
                                                                    руб.</span>
                                                                </div>
                                                            </div>
                                                            <p class="desc">{{$product->description}}</p>
                                                            <div class="last-cart l-mrgn ns">
                                                                <a class="buy-btn las4" onclick="return false"
                                                                   title="Add To Cart"
                                                                   data-toggle="tooltip"
                                                                   data-placement="top"
                                                                   data-id="{{$product->id}}"
                                                                   data-name="{{$product->name}}"
                                                                   data-price="{{$product->price}}"
                                                                   data-url="{{route('product.show',$product)}}">
                                                                    <i class="fa fa-shopping-cart fa-lg"></i>
                                                                </a>
                                                            </div>
                                                            <div class="tb-product-btn">
                                                                <a href="{{route('product.show',$product)}}">
                                                                    <i class="fa fa-eye"></i>
                                                                </a>
                                                                <a href="#">
                                                                    <i class="fa fa-heart"></i>
                                                                </a>
                                                                <a href="#">
                                                                    <i class="fa fa-retweet"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="shop-all-tab-cr shop-bottom">
                                <div class="two-part">
                                    <div class="shop5 page">
                                        {!! $products->appends(['first_price'=>$firstPrice,'last_price'=>$lastPrice,'manufacturers'=>$selectedManufacturersIds])->render() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- shop-style  content section end -->
@endsection
