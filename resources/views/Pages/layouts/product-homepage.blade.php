@section('title')
    Trang Chủ
@endsection
<!-- Hot deals -->
<div class="hot-deals-row">
    <div class="container">
        <div class="hot-deals-box">
            <div class="row">
                <div class="col-sm-12 col-md-1 col-lg-1">
                    <div class="hot-deals-tab">
                        <div class="hot-deals-title vertical-text">
                            <span class="mt-4">N</span>
                            <span class="mt-2">Ổ</span>
                            <span class="mt-2">I</span>
                            <span class="yellow mt-5">B</span>
                            <span class="yellow mt-2">Ậ</span>
                            <span class="yellow mt-2">T</span>
                        </div>

                    </div>
                </div>
                <div class="col-sm-12 col-md-11 col-lg-11 hot-deals-tab-content-col">
                    <div class="hot-deals-tab-content tab-container">
                        <ul class="products owl-carousel" data-dots="false" data-loop="true" data-nav = "true" data-margin = "15" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":4},"1200":{"items":5}}'>
                            @foreach($productTop as $product)
                                <li class="product">
                                <div class="product-container">
                                    <div class="product-image">
                                        @if(count($product->images)>0)
                                            <a href="product-detail/{{$product->id}}"><img style="height: 209px" src="{{$product->images[0]->image_path}}" alt="Product"></a>
                                        @else
                                            <a href="product-detail/{{$product->id}}"><img style="height: 209px" src="uploads/product_images/no-image.jpg" alt="Product"></a>
                                        @endif
                                        <div class="group-tool-button" style="left: 64%">
                                            <a class="wishlist withlist" id-product = "{{$product->id}}" style="cursor: pointer">withlist</a>
                                            <a class="cart" href="#">cart</a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <h5 class="product-name"><a href="#">{{substr($product->name,0,22)}}</a></h5>
                                        <div class="product-rating">
                                            <div style="color: black">{{$product->customer->name}}</div>
                                        </div>
                                        <span class="status-sale"></span>
                                        <div class="box-price">
                                            <span class="product-price">Giá: {{$product->price}}đ</span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ./Hot deals -->
@if(Auth::guard('customer')->check())
<div class="row-blog">
    <div class="container">
        <!-- blog list -->
        <div class="blog-list">
            <h2 class="page-heading">
                <span class="page-heading-title">Sản Phẩm Đã Xem</span>
            </h2>
            <div class="blog-list-wapper">
                <ul class="products owl-carousel" data-dots="false" data-loop="true" data-nav = "true" data-margin = "30" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":5}}'>
                    @foreach($watchedProduct as $product)
                        <li class="product">
                            <div class="product-container">
                                <div class="product-image">
                                    @if(count($product->images)>0)
                                        <a href="product-detail/{{$product->id}}"><img style="height: 209px" src="{{$product->images[0]->image_path}}" alt="Product"></a>
                                    @else
                                        <a href="product-detail/{{$product->id}}"><img style="height: 209px" src="uploads/product_images/no-image.jpg" alt="Product"></a>
                                    @endif
                                    <div class="group-tool-button" style="left: 67%">
                                        <a class="wishlist withlist" id-product = "{{$product->id}}" style="cursor: pointer">withlist</a>
                                        <a class="cart" href="#">cart</a>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <h5 class="product-name"><a href="#">{{substr($product->name,0,22)}}</a></h5>
                                    <div class="product-rating">
                                        <div style="color: black">{{$product->customer->name}}</div>
                                        @if($product->status == 0)
                                            @if($product->seller_id==null || $product->buyer_id==null)
                                                <button class="btn btn-danger">Cần bán</button>
                                                @else
                                                <button class="btn btn-primary">Đã bán</button>
                                            @endif

                                        @else
                                            <button class="btn btn-info">Cần mua</button>
                                        @endif
                                    </div>
                                    <div class="box-price">
                                        @if($product->status == 0)
                                            <span class="product-price">Giá: {{$product->price}}đ</span>
                                            @else
                                            <span class="product-price"style="color: #2fa360">Giá: {{$product->price}}đ</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach

                </ul>
            </div>
        </div>
        <!-- ./blog list -->

    </div>
</div>
@endif

<!-- box product fashion -->
<div class="box-products fashion">
    <div class="container">
        <div class="box-product-head">
            <div class="box-product-head-left">
                <div class="box-title">
                    <span class="icon"><img src="assets-home/data/option7/i1.png" alt="icon"></span>
                    <span class="text">Đăng gần đây nhất</span>
                </div>
            </div>
            <div class="box-product-head-right">
                <ul class="box-tabs nav-tab">
                    <li class="active"><a data-toggle="tab" href="#tab-1">Cần Bán</a></li>
                    <li><a data-toggle="tab" href="#tab-2">Cần Mua</a></li>
                </ul>
                <div id="elevator-1" class="floor-elevator">
                    <a href="#elevator-1" class="btn-elevator up fa fa-angle-up"></a>
                    <a href="#elevator-2" class="btn-elevator down fa fa-angle-down"></a>
                </div>
            </div>
        </div>
        <div class="box-produts-content">
            <div class="block-product-left">
                <div class="block-sub-cat owl-carousel" data-items="1" data-nav="true" data-loop="true" data-dots="false">
                    <ul class="list-cat" style="height: 246px">
                        @foreach($categories as $category)
                            <li><a style="cursor: pointer" class="post-latest" id_cate = {{$category->id}}>{{$category->name}}</a></li>
                        @endforeach
                    </ul>
                    <ul class="list-cat">

                    </ul>
                </div>
                <div class="block-box-products-banner banner-img">
                    <a href="#"><img src="assets-home/data/option7/b3.jpg" alt="Banner"></a>
                </div>
            </div>
            <div class="block-product-right">
                <div class="tab-container">
                    <div id="tab-1" class="tab-panel active">
                        <ul class="products" id="latest-product-sell">
                            @foreach($productBuyLatest as $product)
                                <li class="product" >
                                <div class="product-container">
                                    <div class="product-image">
                                        @if(count($product->images)>0)
                                            <a href="product-detail/{{$product->id}}"><img style="height: 209px" src="{{$product->images[0]->image_path}}" alt="Product"></a>
                                        @else
                                            <a href="product-detail/{{$product->id}}"><img style="height: 209px" src="uploads/product_images/no-image.jpg" alt="Product"></a>
                                        @endif
                                        <div class="group-tool-button" style="left: 67%">
                                            <a class="withlist wishlist" id-product="{{$product->id}}">withlist</a>
                                            <a class="cart" href="#">cart</a>
                                        </div>
                                        <a href="product-detail/{{$product->id}}" class="quick-view">Qick view</a>
                                        <span class="status-new"></span>
                                    </div>
                                    <div class="product-info">
                                        <h5 class="product-name"><a href="product-detail/{{$product->id}}">{{$product->name}}</a></h5>
                                        <div class="product-rating">
                                            <div style="color: black">{{$product->customer->name}}</div>
                                        </div>
                                        <div class="box-price">
                                            <span class="product-price" >Giá: {{$product->price}}đ</span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div id="tab-2" class="tab-panel">
                        <ul class="products" id="latest-product-buy">
                            @foreach($productSellLatest as $product)
                                <li class="product">
                                    <div class="product-container">
                                        <div class="product-image">
                                            @if(count($product->images)>0)
                                                <a href="product-detail/{{$product->id}}"><img style="height: 209px" src="{{$product->images[0]->image_path}}" alt="Product"></a>
                                            @else
                                                <a href="product-detail/{{$product->id}}"><img style="height: 209px" src="uploads/product_images/no-image.jpg" alt="Product"></a>
                                            @endif
                                            <div class="group-tool-button" style="left: 67%">
                                                <a class="withlist wishlist" id-product="{{$product->id}}">withlist</a>
                                                <a class="cart" href="#">cart</a>
                                            </div>
                                            <a href="product-detail/{{$product->id}}" class="quick-view">Qick view</a>
                                            <span class="status-new"></span>
                                        </div>
                                        <div class="product-info">
                                            <h5 class="product-name"><a href="product-detail/{{$product->id}}">{{$product->name}}</a></h5>

                                            <div class="product-rating">
                                                <div style="color: black">{{$product->customer->name}}</div>
                                            </div>
                                            <div class="box-price">
                                                <span class="product-price" style="color: #2fa360">Giá: {{$product->price}}đ</span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ./box product fashion -->
<!-- box product sports -->
<div class="box-products sports right">
    <div class="container">
        <div class="box-product-head">
            <div class="box-product-head-left">
                <div class="box-title">
                    <span class="icon"><img src="assets-home/data/option7/i2.png" alt="icon"></span>
                    <span class="text">Nhiều người quan tâm nhất</span>
                </div>
            </div>
            <div class="box-product-head-right">
                <ul class="box-tabs nav-tab">
                    <li class="active"><a data-toggle="tab" href="#tab-3">Cần bán</a></li>
                    <li><a data-toggle="tab" href="#tab-4">Cần mua</a></li>
                </ul>
                <div id="elevator-2" class="floor-elevator">
                    <a href="#elevator-1" class="btn-elevator up fa fa-angle-up"></a>
                    <a href="#elevator-3" class="btn-elevator down fa fa-angle-down"></a>
                </div>
            </div>
        </div>
        <div class="box-produts-content">
            <div class="block-product-left">
                <div class="block-sub-cat owl-carousel" data-items="1" data-nav="true" data-loop="true" data-dots="false">
                    <ul class="list-cat">
                        @foreach($categories as $category)
                            <li><a style="cursor: pointer" class="post-care" id_cate = {{$category->id}}>{{$category->name}}</a></li>
                        @endforeach
                    </ul>
                    <ul class="list-cat">

                    </ul>
                </div>
                <div class="block-box-products-banner banner-img">
                    <a href="#"><img src="assets-home/data/option7/b4.jpg" alt="Banner"></a>
                </div>
            </div>
            <div class="block-product-right">
                <div class="tab-container">
                    <div id="tab-3" class="tab-panel active">
                        <ul class="products" id="care-product-sell">
                           @foreach($productSellCare as $product)
                                <li class="product">
                                    <div class="product-container">
                                        <div class="product-image">
                                            @if(count($product->images)>0)
                                                <a href="product-detail/{{$product->id}}"><img style="height: 209px" src="{{$product->images[0]->image_path}}" alt="Product"></a>
                                            @else
                                                <a href="product-detail/{{$product->id}}"><img style="height: 209px" src="uploads/product_images/no-image.jpg" alt="Product"></a>
                                            @endif
                                            <div class="group-tool-button" style="left: 67%">
                                                <a class="withlist wishlist" id-product="{{$product->id}}">withlist</a>
                                                <a class="cart" href="#">cart</a>
                                            </div>
                                            <a href="product-detail/{{$product->id}}" class="quick-view">Qick view</a>
                                        </div>
                                        <div class="product-info">
                                            <h5 class="product-name"><a href="product-detail/{{$product->id}}">{{$product->name}}</a></h5>
                                            <div><i class="fas fa-eye" style="margin-top:5px "></i><strong> {{$product->view}}</strong></div>
                                            <div class="product-rating">
                                                <div style="color: black">{{$product->customer->name}}</div>
                                            </div>
                                            <div class="box-price">
                                                <span class="product-price" style="color: red">Giá: {{$product->price}}đ</span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div id="tab-4" class="tab-panel">
                        <ul class="products" id="care-product-buy">
                            @foreach($productBuyCare as $product)
                                <li class="product">
                                    <div class="product-container">
                                        <div class="product-image">
                                            @if(count($product->images)>0)
                                                <a href="product-detail/{{$product->id}}"><img style="height: 209px" src="{{$product->images[0]->image_path}}" alt="Product"></a>
                                            @else
                                                <a href="product-detail/{{$product->id}}"><img style="height: 209px" src="uploads/product_images/no-image.jpg" alt="Product"></a>
                                            @endif
                                            <div class="group-tool-button" style="left: 67%">
                                                <a class="withlist wishlist" id-product="{{$product->id}}">withlist</a>
                                                <a class="cart" href="#">cart</a>
                                            </div>
                                            <a href="product-detail/{{$product->id}}" class="quick-view">Qick view</a>
                                        </div>
                                        <div class="product-info">
                                            <h5 class="product-name"><a href="product-detail/{{$product->id}}">{{$product->name}}</a></h5>
                                            <div><i class="fas fa-eye" style="margin-top:5px "></i><strong> {{$product->view}}</strong></div>
                                            <div class="product-rating">
                                                <div style="color: black">{{$product->customer->name}}</div>
                                            </div>
                                            <div class="box-price">
                                                <span class="product-price" style="color: #2fa360">Giá: {{$product->price}}đ</span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ./box product sports -->


<!-- ./box product diltal -->
<div class="row-blog">
    <div class="container">
        <!-- blog list -->
        <div class="blog-list">
            <h2 class="page-heading">
                <span class="page-heading-title">Tin Tức</span>
            </h2>
            <div class="blog-list-wapper">
                <ul class="owl-carousel" data-dots="false" data-loop="true" data-nav = "true" data-margin = "30" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":4}}'>
                    <li>
                        <div class="post-thumb image-hover2">
                            <a href="#"><img src="assets-home/data/option7/blog1.jpg" alt="Blog"></a>
                        </div>
                        <div class="post-desc">
                            <h5 class="post-title">
                                <a href="#">Share the love with KuteShop</a>
                            </h5>
                            <div class="post-meta">
                                <span class="date">February 27, 2015</span>
                            </div>
                            <div class="desc">Vivamus eu leo ligula? Maecenas quis risus lorem; vitae sagittis metus. Ut justo magna, feugiat ac tristique id, vehicula id magna. Mauris ull amcorperpurus aucto</div>
                            <div class="meta-tags">
                                <i class="fa fa-tag"></i>
                                <a href="#">Fashions, </a><a href="#">Make up</a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="post-thumb image-hover2">
                            <a href="#"><img src="assets-home/data/option7/blog2.jpg" alt="Blog"></a>
                        </div>
                        <div class="post-desc">
                            <h5 class="post-title">
                                <a href="#">Share the love with KuteShop</a>
                            </h5>
                            <div class="post-meta">
                                <span class="date">February 27, 2015</span>
                            </div>
                            <div class="desc">Vivamus eu leo ligula? Maecenas quis risus lorem; vitae sagittis metus. Ut justo magna, feugiat ac tristique id, vehicula id magna. Mauris ull amcorperpurus aucto</div>
                            <div class="meta-tags">
                                <i class="fa fa-tag"></i>
                                <a href="#">Fashions, </a><a href="#">Make up</a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="post-thumb image-hover2">
                            <a href="#"><img src="assets-home/data/option7/blog3.jpg" alt="Blog"></a>
                        </div>
                        <div class="post-desc">
                            <h5 class="post-title">
                                <a href="#">Share the love with KuteShop</a>
                            </h5>
                            <div class="post-meta">
                                <span class="date">February 27, 2015</span>
                            </div>
                            <div class="desc">Vivamus eu leo ligula? Maecenas quis risus lorem; vitae sagittis metus. Ut justo magna, feugiat ac tristique id, vehicula id magna. Mauris ull amcorperpurus aucto</div>
                            <div class="meta-tags">
                                <i class="fa fa-tag"></i>
                                <a href="#">Fashions, </a><a href="#">Make up</a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="post-thumb image-hover2">
                            <a href="#"><img src="assets-home/data/option7/blog4.jpg" alt="Blog"></a>
                        </div>
                        <div class="post-desc">
                            <h5 class="post-title">
                                <a href="#">Share the love with KuteShop</a>
                            </h5>
                            <div class="post-meta">
                                <span class="date">February 27, 2015</span>
                            </div>
                            <div class="desc">Vivamus eu leo ligula? Maecenas quis risus lorem; vitae sagittis metus. Ut justo magna, feugiat ac tristique id, vehicula id magna. Mauris ull amcorperpurus aucto</div>
                            <div class="meta-tags">
                                <i class="fa fa-tag"></i>
                                <a href="#">Fashions, </a><a href="#">Make up</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <!-- ./blog list -->

    </div>
</div>
@section('script-1')
    <script type="text/javascript" src="{{'js/product-homepage.js'}}"></script>
@endsection


