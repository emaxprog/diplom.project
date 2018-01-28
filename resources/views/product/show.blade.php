@extends('layouts.app')
@section('content')
    <!-- pages-title-start -->
    <section class="contact-img-area" @if(isset($afisha)) style="background-image: url({{$afisha->path}});" @endif>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="con-text">
                        <h2 class="page-title">Single Product</h2>
                        <p><a href="#">Home</a> | Single Product</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- pages-title-end -->
    <!-- single peoduct content section start -->
    <section class="single-product-area sit">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 none-si-pro">
                            <div class="pro-img-tab-content tab-content">
                                <div class="tab-pane active" id="image-1">
                                    <div class="simpleLens-big-image-container">
                                        <a class="simpleLens-lens-image" data-lightbox="roadtrip"
                                           data-lens-image="{{$product->imagePreview->path}}"
                                           href="{{$product->imagePreview->path}}">
                                            <img src="{{$product->imagePreview->path}}" alt=""
                                                 class="simpleLens-big-image">
                                        </a>
                                    </div>
                                </div>
                                <div class="tab-pane" id="image-2">
                                    <div class="simpleLens-big-image-container">
                                        <a class="simpleLens-lens-image" data-lightbox="roadtrip"
                                           data-lens-image="img/products/13.jpg" href="img/products/13.jpg">
                                            <img src="img/products/13.jpg" alt="" class="simpleLens-big-image">
                                        </a>
                                    </div>
                                </div>
                                <div class="tab-pane" id="image-3">
                                    <div class="simpleLens-big-image-container">
                                        <a class="simpleLens-lens-image" data-lightbox="roadtrip"
                                           data-lens-image="img/products/14.jpg" href="img/products/14.jpg">
                                            <img src="img/products/14.jpg" alt="" class="simpleLens-big-image">
                                        </a>
                                    </div>
                                </div>
                                <div class="tab-pane" id="image-4">
                                    <div class="simpleLens-big-image-container">
                                        <a class="simpleLens-lens-image" data-lightbox="roadtrip"
                                           data-lens-image="img/products/15.jpg" href="img/products/15.jpg">
                                            <img src="img/products/15.jpg" alt="" class="simpleLens-big-image">
                                        </a>
                                    </div>
                                </div>
                                <div class="tab-pane" id="image-5">
                                    <div class="simpleLens-big-image-container">
                                        <a class="simpleLens-lens-image" data-lightbox="roadtrip"
                                           data-lens-image="img/products/11.jpg" href="img/products/11.jpg">
                                            <img src="img/products/11.jpg" alt="" class="simpleLens-big-image">
                                        </a>
                                    </div>
                                </div>
                                <div class="tab-pane" id="image-6">
                                    <div class="simpleLens-big-image-container">
                                        <a class="simpleLens-lens-image" data-lightbox="roadtrip"
                                           data-lens-image="img/products/10.jpg" href="img/products/10.jpg">
                                            <img src="img/products/10.jpg" alt="" class="simpleLens-big-image">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="pro-img-tab-slider indicator-style2">
                                <div class="item"><a href="#image-1" data-toggle="tab"><img
                                                src="{{$product->imagePreview->path}}"
                                                alt=""/></a></div>
                                <div class="item"><a href="#image-2" data-toggle="tab"><img src="img/products/13.jpg"
                                                                                            alt=""/></a></div>
                                <div class="item"><a href="#image-3" data-toggle="tab"><img src="img/products/14.jpg"
                                                                                            alt=""/></a></div>
                                <div class="item"><a href="#image-4" data-toggle="tab"><img src="img/products/15.jpg"
                                                                                            alt=""/></a></div>
                                <div class="item"><a href="#image-5" data-toggle="tab"><img src="img/products/11.jpg"
                                                                                            alt=""/></a></div>
                                <div class="item"><a href="#image-6" data-toggle="tab"><img src="img/products/10.jpg"
                                                                                            alt=""/></a></div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="cras">
                                <div class="product-name">
                                    <h2>{{$product->name}}</h2>
                                </div>
                                <div class="pro-rating cendo-pro">
                                    @for($i=0;$i<5;$i++)
                                        <div class="pro_one">
                                            <span class="fa fa-stack"
                                                  @if($i<$product->getRating()) style="color: #f4a137;" @endif>
                                                <i class="fa fa-star fa-stack-2x"></i>
                                                <i class="fa fa-star-o fa-stack-2x"></i>
                                            </span>
                                        </div>
                                    @endfor
                                    <p class="rating-links">
                                        <a href="#comments">{{count($product->comments)}} Reviews</a>
                                    </p>
                                </div>
                                <p class="availability in-stock">
                                    Product Code: {!! $product->code !!}
                                </p>
                                <p class="availability in-stock2">
                                    Availability:In stock
                                </p>
                                <div class="short-description">
                                    <p>{!! $product->description !!}</p>
                                </div>
                                <div class="pre-box">
                                    <span class="special-price">{!! $product->price !!} руб.</span>
                                </div>
                                <div class="add-to-box1">
                                    <div class="add-to-box add-to-box2">
                                        <div class="add-to-cart">
                                            <div class="input-content">
                                                <label>Quantity:</label>
                                                <div class="quantity">
                                                    <div class="cart-plus-minus">
                                                        <input type="text" value="1" name="qtybutton"
                                                               class="cart-plus-minus-box input-qty"
                                                               data-id="{{$product->id}}"
                                                               data-url="{{route('cart.qty',$product->id)}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-icon">
                                                <a class="buy-btn" onclick="return false"
                                                   title="Add To Cart"
                                                   data-toggle="tooltip"
                                                   data-placement="top"
                                                   data-id="{{$product->id}}"
                                                   data-name="{{$product->name}}"
                                                   data-price="{{$product->price}}"><i
                                                            class="fa fa-shopping-cart"></i>
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
                                <div class="s-cart-img">
                                    <a href="#">
                                        <img alt="" src="img/icon-img/screenshot_2.png">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <div class="text">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active">
                                        <a href="#home" aria-controls="home" role="tab" data-toggle="tab">Product
                                            Description</a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#params" aria-controls="params" role="tab" data-toggle="tab">Product
                                            params</a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#comments" aria-controls="comments" role="tab" data-toggle="tab">Reviews
                                            ({{count($product->comments)}})</a>
                                    </li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content tab-con2">
                                    <div role="tabpanel" class="tab-pane active"
                                         id="home">{!! $product->description !!}</div>
                                    <div role="tabpanel" class="tab-pane" id="params">
                                        <table class="table table-striped">
                                            @foreach($params as $param)
                                                <tr>
                                                    <td><strong>{!! $param->name !!}</strong></td>
                                                    <td>{!! $param->value !!}</td>
                                                    <td>{!! $param->unit !!}</td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="comments">
                                        <form class="form-horizontal" action="{{route('product.review',$product)}}"
                                              method="post">
                                            {{csrf_field()}}
                                            @foreach($product->comments as $comment)
                                                <div id="review_{{$comment->id}}">
                                                    <table class="table table-striped table-bordered">
                                                        <tr>
                                                            <td style="width: 50%;">
                                                                <strong>{{$comment->user->username}}</strong>
                                                            </td>
                                                            <td class="text-right">{{$comment->created_at}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2">
                                                                <p class="text an-text">{!! $comment->review !!}</p>
                                                                @for($i=0;$i<$comment->rating;$i++)
                                                                    <span class="fa fa-stack">
                                                                    <i class="fa fa-star fa-stack-2x"></i>
                                                                    <i class="fa fa-star-o fa-stack-2x"></i>
                                                                </span>
                                                                @endfor
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <div class="text-right"></div>
                                                </div>
                                            @endforeach
                                            @if($authCheck)
                                                <h2 class="write">Write a review</h2>
                                                <div class="form-group required">
                                                    <div class="col-sm-12">
                                                        <label class="control-label" for="input-review">Your
                                                            Review</label>
                                                        <textarea id="input-review" class="form-control" rows="5"
                                                                  name="review"></textarea>
                                                        <div class="help-block">
                                                            <span class="text-danger">Note:</span>
                                                            HTML is not translated!
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group required">
                                                    <div class="col-sm-12">
                                                        <label class="control-label">Rating</label>
                                                        Bad
                                                        <input type="radio" value="1" name="rating">
                                                        <input type="radio" value="2" name="rating">
                                                        <input type="radio" value="3" name="rating">
                                                        <input type="radio" value="4" name="rating">
                                                        <input type="radio" value="5" name="rating">
                                                        Good
                                                    </div>
                                                </div>
                                                <div class="buttons si-button">
                                                    <div class="pull-right">
                                                        <button id="button-review" class="btn btn-primary"
                                                                data-loading-text="Loading..." type="submit">Continue
                                                        </button>
                                                    </div>
                                                </div>
                                            @endif
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="single-sidebar">
                        @if(!empty($popularProducts))
                            <div class="single-sidebar an-shop">
                                <h3 class="wg-title">BEST SELLER</h3>
                                <ul>
                                    @foreach($popularProducts as $popularProduct)
                                        <li class="b-none7">
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
                </div>
            </div>
        </div>
    </section>
@endsection