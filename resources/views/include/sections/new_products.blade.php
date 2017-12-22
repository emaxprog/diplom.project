<!-- new-products section start -->
<section class="featured-products single-products section-padding-top">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="section-title">
                    <h3>FEATURED PRODUCTS</h3>
                    <div class="section-icon">
                        <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="product-tab nav nav-tabs">
                    <ul>
                        <li class="active"><a data-toggle="tab" href="#all">all shop</a></li>
                        @foreach($recommendedProducts as $category)
                            <li><a data-toggle="tab" href="#{{$category->slug}}">{{$category->name}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="row tab-content">
            <div class="tab-pane  fade in active" id="all">
                <div id="tab-carousel-1" class="re-owl-carousel owl-carousel product-slider owl-theme">
                    <?php $i = 0; ?>
                    @foreach($recommendedProducts as $category)
                        @foreach($category->products as $product)
                            @if($i%2==0)
                                <div class="col-xs-12">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <div class="pro-type">
                                                <span>sale</span>
                                            </div>
                                            <a href="{{route('product.show',$product)}}">
                                                <img src="{{$product->imagePreview->path}}" alt="Product Title"
                                                     id="img-{{$product->id}}"/>
                                            </a>
                                        </div>
                                        <div class="product-dsc">
                                            <h3><a href="{{route('product.show',$product)}}">{{$product->name}}</a></h3>
                                            <div class="star-price">
                                                <span class="price-left">{{$product->price}} руб.</span>
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
                                               data-original-title="Add To Wishlist"><i class="fa fa-heart"></i></a>
                                            <a title="" data-placement="top" data-toggle="tooltip" href="#"
                                               data-original-title="Compare"><i class="fa fa-retweet"></i></a>
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
                                    @else
                                        <div class="single-product margin-top">
                                            <div class="product-img">
                                                <a href="{{route('product.show',$product)}}">
                                                    <img src="{{$product->imagePreview->path}}" alt="Product Title"
                                                         id="img-{{$product->id}}"/>
                                                </a>
                                            </div>
                                            <div class="product-dsc">
                                                <h3><a href="{{route('product.show',$product)}}">{{$product->name}}</a>
                                                </h3>
                                                <div class="star-price">
                                                    <span class="price-left">{{$product->price}} руб.</span>
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
                                                   data-original-title="Add To Wishlist"><i class="fa fa-heart"></i></a>
                                                <a title="" data-placement="top" data-toggle="tooltip" href="#"
                                                   data-original-title="Compare"><i class="fa fa-retweet"></i></a>
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
                                <!-- single product end -->
                            @endif
                            <?php $i++; ?>
                        @endforeach
                    @endforeach
                    @if(count($category->products)%2!==0)
                </div>
                <!-- single product end -->
                @endif
            </div>
        </div>
        <!-- all shop product end -->
        <?php $i = 0; ?>
        @foreach($recommendedProducts as $category)
            <div class="tab-pane  fade in" id="{{$category->slug}}">
                <div id="tab-carousel-2" class="owl-carousel product-slider owl-theme">
                    @foreach($category->products as $product)
                        @if($i%2==0)
                            <div class="col-xs-12">
                                <div class="single-product">
                                    <div class="product-img">
                                        <div class="pro-type">
                                            <span>sale</span>
                                        </div>
                                        <a href="{{route('product.show',$product)}}">
                                            <img src="{{$product->imagePreview->path}}" alt="Product Title"
                                                 id="product-img-{{$product->id}}"/>
                                        </a>
                                    </div>
                                    <div class="product-dsc">
                                        <h3><a href="{{route('product.show',$product)}}">{{$product->name}}</a></h3>
                                        <div class="star-price">
                                            <span class="price-left">{{$product->price}} руб.</span>
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
                                           data-original-title="Add To Wishlist"><i class="fa fa-heart"></i></a>
                                        <a title="" data-placement="top" data-toggle="tooltip" href="#"
                                           data-original-title="Compare"><i class="fa fa-retweet"></i></a>
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
                                @endif
                                @if($i%2!==0)
                                    <div class="single-product margin-top">
                                        <div class="product-img">
                                            <a href="{{route('product.show',$product)}}">
                                                <img src="{{$product->imagePreview->path}}" alt="Product Title"
                                                     id="img-{{$product->id}}"/>
                                            </a>
                                        </div>
                                        <div class="product-dsc">
                                            <h3><a href="#">{{$product->name}}</a></h3>
                                            <div class="star-price">
                                                <span class="price-left">{{$product->price}} руб.</span>
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
                                               data-original-title="Add To Wishlist"><i class="fa fa-heart"></i></a>
                                            <a title="" data-placement="top" data-toggle="tooltip" href="#"
                                               data-original-title="Compare"><i class="fa fa-retweet"></i></a>
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
                            <!-- single product end -->
                        @endif
                        <?php $i++; ?>
                    @endforeach
                </div>
            </div>
        <!-- {{$category->slug}} product end -->
        @endforeach
    </div>
</section>
<!-- new-products section end -->