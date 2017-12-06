<!-- new-products section start -->
<section class="new-products single-products section-padding-top">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="section-title">
                    <h3>new arrivals</h3>
                    <div class="section-icon">
                        <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div id="new-products" class="owl-carousel product-slider owl-theme">
                @foreach($latestProducts as $product)
                    <div class="col-xs-12">
                        <div class="single-product">
                            <div class="product-img">
                                <div class="pro-type">
                                    <span>sale</span>
                                </div>
                                <a href="{{route('product.show',$product)}}">
                                    <img src="{{$product->imagePreview->path}}" alt="Product Title"/>
                                    <img class="secondary-image" alt="Product Title"
                                         src="img/products/2.jpg">
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
                                <a href="{{route('product.show',$product)}}" data-placement="top"
                                   data-trigger="hover"><i
                                            class="fa fa-eye"></i></a>
                                <a data-placement="top" data-toggle="tooltip" href="#"
                                   data-original-title="Add To Wishlist"><i class="fa fa-heart"></i></a>
                                <a title="" data-placement="top" data-toggle="tooltip" href="#"
                                   data-original-title="Compare"><i class="fa fa-retweet"></i></a>
                                <a href="#" data-toggle="tooltip" data-placement="top"
                                   title="Add To Cart"><i
                                            class="fa fa-shopping-cart"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- new-products section end -->