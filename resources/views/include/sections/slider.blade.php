<!-- slider-section-start -->
<section class="slider-main-area">
    <div class="main-slider an-si">
        <div class="bend niceties preview-2 hm-ver-1">
            <div id="ensign-nivoslider-2" class="slides">
                @foreach($afisha->images as $image)
                    <img src="{{$image->path}}" alt="" title="#slider-direction-{{$image->id}}"/>
                @endforeach
            </div>
        @foreach($afisha->images as $image)
            <!-- direction 1 -->
                <div id="slider-direction-{{$image->id}}" class="t-cn slider-direction Builder">
                    <div class="slide-all">
                        <!-- layer 1 -->
                        <div class="layer-1">
                            <h2 class="title5">{{$afisha->description}}</h2>
                        </div>
                        <!-- layer 2 -->
                        <div class="layer-2">
                            <h2 class="title6">{{$afisha->title}}</h2>
                        </div>
                        <!-- layer 2 -->
                        <div class="layer-2">
                            <p class="title0">{{$afisha->caption}}</p>
                        </div>
                        <!-- layer 3 -->
                        <div class="layer-3">
                            <a class="min1" href="{{route('catalog')}}">Shop Now</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- slider section end -->