<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css">

    <base href="{{asset('')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets-home/lib/bootstrap/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets-home/lib/font-awesome/css/font-awesome.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets-home/lib/select2/css/select2.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets-home/lib/jquery.bxslider/jquery.bxslider.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets-home/lib/owl.carousel/owl.carousel.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets-home/lib/jquery-ui/jquery-ui.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets-home/css/animate.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets-home/css/reset.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets-home/css/style.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets-home/css/responsive.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets-home/css/option7.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('template-login/css/login-register.css')}}" />
    @yield('css')
    <style>
        .tt-suggestion strong {
            font-weight: normal;
            color: red;
        }
    </style>
    {{-- <!-- Main CSS-->--}}
    <link rel="stylesheet" type="text/css" href="{{ asset('css/common.css') }}" media="all">
{{--    <link href="{{ asset('dist/css/theme.min.css') }}" rel="stylesheet" media="all">--}}
{{--    <link href="{{ asset('dist/css/custom.min.css') }}" rel="stylesheet" media="all">--}}

    <title>@yield('title')</title>
    <style>
        .wapper-page{
            background-color: #fff;margin-top: 20px; padding: 20px
        }
        .min-height-800{
            min-height: 800px;
        }
    </style>
</head>
<body class="home option7">
<!-- HEADER -->
@csrf
<div id="header" class="header">
    <div class="top-header">
        <div class="container">
            <div class="nav-top-links">
                <a class="first-item" href="#">Welcome</a>
                <a href="#">Call Us: +09 957774334</a>
            </div>
            <div class="top-bar-social">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-pinterest"></i></a>
                <a href="#"><i class="fa fa-google-plus"></i></a>
            </div>
{{--            modal--}}
            <div class="modal fade" id="modal_1" role="dialog">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h5 class="modal-title">Đã có trong danh sách yêu thích</h5>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Đóng</button>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal fade" id="modal_2" role="dialog">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h5 class="modal-title">Bạn cần đăng nhập để sử dụng chức năng này</h5>
                        </div>
                        <div class="modal-footer">
                            <a class="btn btn-success" data-dismiss="modal" data-toggle="modal" href="javascript:void(0)" onclick="openLoginModal();">Đăng nhập</a>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="modal_3" role="dialog">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h5 class="modal-title">Đã thêm vào danh sách yêu thích</h5>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bolock-heart-topbar" id="cart-block">
                    <a style="cursor: pointer">Wishlist<span class="count" id="count-wishlist">{{count($wishlist_product)}}</span></a>
                    <div class="cart-block">
                        <div class="cart-block-content">
                            <strong  class="cart-title text-center">Danh sách yêu thích</strong>
                            <hr>
                            <div class="cart-block-list" id="list-wishlist">
                                <ul>
                                    @if(count($productCare)==0)
                                        <div class="p-3" style="color: red">Không có sản phẩm nào</div>
                                    @else
                                        @foreach($wishlist_product as $product)
                                        <li class="product-info" id="wishlist-{{$product->id}}">
                                            <div class="p-left">
                                                <a style="cursor: pointer" id-product="{{$product->id}}" class="remove_link remove-wishlist-online" ></a>
                                                <a style="padding-left: 16px" href="product-detail/{{$product->id}}">
                                                    @if(count($product->images)>0)
                                                        <img class="img-responsive" width="80%" src="{{$product->images[0]->image_path}}" alt="p10">
                                                        @else
                                                        <img id="product-zoom" height="85px" src='uploads/product_images/no-image.jpg' data-zoom-image="uploads/product_images/no-image.jpg"/>
                                                    @endif
                                                </a>
                                            </div>
                                            <div class="p-right">
                                                <strong class="p-name">{{$product->name}}</strong>

                                                @if($product->status == 0)
                                                    <div>
                                                        <span style="color: red">Giá: {{$product->price}}</span>
                                                    </div>
                                                    <div><strong style="color: red">
                                                        Cần bán
                                                    </strong></div>
                                                @else
                                                    <div>
                                                        <span style="color: #2fa360">Giá: {{$product->price}}</span>
                                                    </div>
                                                    <div><strong style="color: #2fa360">Cần mua</strong></div>
                                                @endif
                                                <i>Nguời đăng: {{$product->customer->name}}</i>
                                            </div>
                                        </li>
                                    @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="bolock-cart-topbar" id="cart-block">
                <a title="My cart" href="{{asset('cart-detail')}}">Cart<span class="count">0</span></a>
                <div class="cart-block" style="width: 430px">
                    <div class="cart-block-content">
                        <h4 class="text-center">Thông Báo</h4>
                        <hr>
                        <div class="cart-block-list">
                            <ul class="nav nav-tabs" >
                                <li class="nav-item active" >
                                    <a class="nav-link active" style="color: #9561e2"data-toggle="tab" href="#home">Danh Mục Quan Tâm</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" style="color: #9561e2"data-toggle="tab" href="#menu1">Hệ Thống</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane container active" id="home">
                                    <ul>
                                        @if(count($productCare)==0)
                                            <div class="p-3" style="color: red">Không có sản phẩm nào</div>
                                        @else
                                            @foreach($productCare as $product)
                                            <li class="product-info">
                                                <div class="p-left">
                                                    <a href="#" class="remove_link"></a>
                                                    <a href="product-detail/{{$product->id}}">
                                                        @if(count($product->images)>0)
                                                            <img class="img-responsive" width="80%" src="{{$product->images[0]->image_path}}" alt="p10">
                                                        @else
                                                            <img id="product-zoom" height="85px" src='uploads/product_images/no-image.jpg' data-zoom-image="uploads/product_images/no-image.jpg"/>
                                                        @endif
                                                    </a>
                                                </div>
                                                <div class="p-right">
                                                    <p class="p-name">{{$product->name}}</p>
                                                    @if($product->status == 0)
                                                        <div>
                                                            <span style="color: red">Giá: {{$product->price}}</span>
                                                        </div>
                                                        <div><strong style="color: red">
                                                                Cần bán
                                                            </strong></div>
                                                    @else
                                                        <div>
                                                            <span style="color: #2fa360">Giá: {{$product->price}}</span>
                                                        </div>
                                                        <div><strong style="color: #2fa360">Cần mua</strong></div>
                                                    @endif
                                                    <i>Nguời đăng: {{$product->customer->name}}</i>
                                                </div>
                                            </li>
                                        @endforeach
                                        @endif
                                    </ul>
                                </div>

                                <div class="tab-pane container fade" id="menu1">

                                    <ul>
                                    @foreach($thongbao as $tb)
                                            <li class="product-info">
                                                <div class="p-left">
                                                    <a href="#" class="remove_link"></a>
                                                    <a href="product-detail/{{$tb->product->id}}">
                                                        @if(count($tb->product->images)>0)
                                                            <img class="img-responsive" width="80%" src="{{$tb->product->images[0]->image_path}}" alt="p10">
                                                        @else
                                                            <img id="product-zoom" height="85px" src='uploads/product_images/no-image.jpg' data-zoom-image="uploads/product_images/no-image.jpg"/>
                                                        @endif
                                                    </a>
                                                </div>
                                                <div class="p-right" style="width: 24%">
                                                    <p class="p-name">

                                                        @if($tb->type == 1)
                                                            <span>Bạn đã báo cáo vi phạm sản phẩm</span>
                                                            <span style="color: #2fa360">"{{$tb->product->name}}"</span>
                                                            <span> chính xác.</span>
                                                            <div>Chúng tôi đã cộng cho bạn <span style="color:#2fa360;">+10000đ</span> tiền thưởng.</div>
                                                        @elseif($tb->type == 2)
                                                            <span>Bạn đã báo cáo vi phạm sản phẩm</span>
                                                            <span style="color: red">"{{$tb->product->name}}"</span>
                                                            <span> không chính xác.</span>
                                                            <div>Chúng tôi đã trừ <span style="color:red;">-15000đ</span> trong tài khoản của bạn.</div>
                                                        @elseif($tb->type == 3)
                                                            <span>Sản phẩm</span>
                                                            <span style="color: red">"{{$tb->product->name}}"</span>
                                                            <span> bạn đăng đã bị cáo cáo vi phạm, sau khi kiểm tra, </span>
                                                            <div>Chúng tôi đã trừ <span style="color:red;">-20000đ</span> trong tài khoản của bạn.</div>
                                                        @endif
                                                    </p>
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
{{--            <div class="support-link">--}}
{{--                <a href="#">Support</a>--}}
{{--            </div>--}}
            <div id="user-info-top" class="user-info pull-right">
                @if(!Auth::guard('customer')->check())
                    <div class="dropdown">
                        <a class="current-open" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#"><span>Tài Khoản</span></a>
                        <ul class="dropdown-menu mega_dropdown" role="menu">
                            <li><a class="btn big-login" data-toggle="modal" href="javascript:void(0)" onclick="openLoginModal();">Đăng nhập</a></li>
                            <li><a class="btn big-register" data-toggle="modal" href="javascript:void(0)" onclick="openRegisterModal();">Đăng ký</a></li>
                        </ul>
                    </div>
                @else
                    <div class="dropdown">
                        <a class="current-open" data-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false" href="#"><span>{{ Auth::guard('customer')->user()->name}}</span></a>
                        <ul class="dropdown-menu mega_dropdown" role="menu">
                            <li><a href="{{ route(CLIENT_LOGOUT) }}">Đăng xuất</a></li>
                        </ul>
                        <ul class="dropdown-menu mega_dropdown p-3" role="menu" style="min-width: 270px">
                            <li>
                                <a href="customer-info">
                                    <div>
                                        @if(Auth::guard('customer')->user()->avatar)
                                            <img style="width: 40px; border: 1px solid #1269db" src="{{Auth::guard('customer')->user()->avatar}}">
                                        @else
                                            <img style="width: 40px; border: 1px solid #1269db" src="uploads/product_images/no-image.jpg">
                                        @endif
                                        {{Auth::guard('customer')->user()->name}}
                                    </div>
                                </a>
                            </li>
                            <hr>
                            <li><a style="padding: 10px 0; margin: 5px  " href="posted-product/{{Auth::guard('customer')->user()->id}}"><i style="font-size: 20px; color: #00b5e9" class="fas fa-upload"></i>&nbsp;Sản phẩm đã đăng</a></li>
                            <li><a style="padding: 10px 0; margin: 5px  " href="traded-product/{{Auth::guard('customer')->user()->id}}"><i style="font-size: 20px; color: red" class="fas fa-shopping-bag"></i>&nbsp;Sản phẩm đã giao dịch</a></li>
                            <hr>
                            <li><a style="padding: 10px 0; margin: 5px  " href=""><i style="font-size: 20px; color: #ba8b00" class="fas fa-wallet"></i>&nbsp;Ví Tiền
                                <span style="float: right; color: red">{{Auth::guard('customer')->user()->wallet}}đ</span>
                                </a></li>
                            <li><a style="padding: 10px 0; margin: 5px  " href=""><i style="font-size: 20px; color: #9561e2" class="fas fa-file-invoice-dollar"></i>&nbsp;Ví đóng băng
                                    <span style="float: right; color: red">{{Auth::guard('customer')->user()->wallet_freeze}}đ</span>
                                </a></li>
                            <li><a style="padding: 10px 0; margin: 5px  " href=""><i style="font-size: 20px; color:#2fa360" class="fas fa-donate"></i>&nbsp;Điểm thưởng
                                    <span style="float: right; color: red">{{Auth::guard('customer')->user()->wallet_reward}}đ</span>
                                </a></li>
                            <li id="show-charts">
                                <a style="padding: 10px 0; margin: 5px" href="charts/{{Auth::guard('customer')->user()->id}}">
                                    <i style="font-size: 20px; color:#ff7700" class="fas fa-chart-pie"></i>&nbsp;Charts
                                </a>
                            </li>
                            <hr>
                            <li><a style="padding: 10px 0; margin: 5px  "href="{{ route(CLIENT_LOGOUT) }}"><i style="font-size: 20px" class="fas fa-sign-out-alt"></i>&nbsp;Đăng Xuất</a></li>
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <!--/.top-header -->

    <div class="container">
        <div class="modal fade login" id="loginModal">
            <div class="modal-dialog login animated">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Đăng Nhập</h4>
                    </div>
                    <div class="text-center">
                        <span class="font-size-message" id="message"></span>
                    </div>
                    <div class="modal-body">
                        <div class="box" id="login-user">
                            <div class="content">
                                <div class="social">
                                    <a id="google_login" href="{{route('google.login')}}">
                                        <button class="btn btn-danger"><i class="fa fa-google-plus fa-fw"></i>Google</button>
                                    </a>
                                    <a id="facebook_login" href="{{route('facebook.login')}}">
                                        <button class="btn btn-primary"><i class="fa fa-facebook fa-fw"></i>Facebook</button>
                                    </a>
                                </div>
                                <div class="division">
                                    <div class="line l"></div>
                                    <span>hoặc</span>
                                    <div class="line r"></div>
                                </div>
                                <div class="error"></div>
                                <div class="form loginBox">
                                    <form method="post" id="loginUserForm" accept-charset="UTF-8">
                                        @csrf
                                        <div>
                                            <input id="email" class="form-control" type="text" placeholder="Email" name="email">
                                            <span class="text-error message-validate" data-error="email"></span>
                                        </div>
                                        <div>
                                            <input id="password" class="form-control" type="password" placeholder="Mật khẩu" name="password">
                                            <span class="text-error message-validate" data-error="password"></span>
                                        </div>
                                        <input id="user-login" class="btn btn-default btn-login" type="button" value="Đăng nhập">
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="box" id="add-user">
                            <div class="content registerBox" style="display:none;">
                                <div class="form">
                                    <form method="post" id="addUserForm" html="{:multipart=>true}" data-remote="true" accept-charset="UTF-8">
                                        @csrf
                                        <div>
                                            <input id="email" class="form-control" type="text" placeholder="Full name" name="name">
                                            <span class="text-error message-validate" data-error="name"></span>
                                        </div>
                                        <div>
                                            <input id="email" class="form-control" type="text" placeholder="Email" name="email">
                                            <span class="text-error message-validate" data-error="email"></span>
                                        </div>
                                        <div>
                                            <input id="password" class="form-control" type="password" placeholder="Password" name="password">
                                            <span class="text-error message-validate" data-error="password"></span>
                                        </div>
                                        <div>
                                            <input id="password_confirmation" class="form-control" type="password" placeholder="Repeat Password" name="passwordAgain">
                                            <span class="text-error message-validate" data-error="passwordAgain"></span>
                                        </div>
                                        <input id="user-submit" class="btn btn-default btn-register" type="button" value="Create account" name="commit">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="forgot login-footer">
                            <span>
                                 <a href="javascript: showRegisterForm();">Tạo tài khoản</a>
                            ?</span>
                        </div>
                        <div class="forgot register-footer" style="display:none">
                            <span>Already have an account?</span>
                            <a href="javascript: showLoginForm();">Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- MAIN HEADER -->
    <div id="main-header">
        <div class="container main-header">
            <div class="row">
                <div class="col-xs-12 col-sm-3 logo">
                    <a href="{{asset('homepage')}}"><img alt="Kute Shop" src="assets-home/data/option7/logo5.png" /></a>
                </div>
                <div id="main-menu" class="col-sm-12 col-md-9 main-menu">
                    <nav class="navbar navbar-default">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                    <i class="fa fa-bars"></i>
                                </button>
                                <a class="navbar-brand" href="#">MENU</a>
                            </div>
                            <div id="navbar" class="navbar-collapse collapse">
                                <ul class="nav navbar-nav">
                                    <li class=""><a href="{{asset('homepage')}}">Trang chủ</a></li>

                                    <li><a href="{{asset('contact')}}">Liên hệ</a></li>
                                    <li><a href="{{asset('about')}}">Giới thiệu</a></li>
                                    <li><a href="{{asset('blogs')}}">Tin tức</a></li>
                                </ul>
                            </div><!--/.nav-collapse -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
{{--    <div class="container">--}}
{{--    @if(session('message-success'))--}}
{{--        <div id="msg" class="alert alert-success">{{session('message-success')}}</div>--}}
{{--    @endif--}}
{{--    </div>--}}
    <!-- END MANIN HEADER -->
{{--    <div class="service-header">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-sm-6 col-md-3">--}}
{{--                    <div class="item">--}}
{{--                        <a href="#">--}}
{{--                            <img src="assets-home/data/option7/s1.png" alt="Service">--}}
{{--                            <span>Worldwide Delivery</span>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-sm-6 col-md-3">--}}
{{--                    <div class="item">--}}
{{--                        <a href="#">--}}
{{--                            <img src="assets-home/data/option7/s2.png" alt="Service">--}}
{{--                            <span>24/7 Help Center</span>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-sm-6 col-md-3">--}}
{{--                    <div class="item">--}}
{{--                        <a href="#">--}}
{{--                            <img src="assets-home/data/option7/s3.png" alt="Service">--}}
{{--                            <span>shop with confidence</span>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-sm-6 col-md-3">--}}
{{--                    <div class="item">--}}
{{--                        <a href="#">--}}
{{--                            <img src="assets-home/data/option7/s4.png" alt="Service">--}}
{{--                            <span>Safe Payment</span>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    @yield('top-menu')

</div>
<!-- end header-->

{{--<div class="container">--}}
    @yield('content')
{{--</div>--}}


<!-- Footer -->
<footer id="footer2">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="footer-logo">
                        <a href="#"><img src="assets-home/data/option7/logo5.png" alt="Logo"></a>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="footer-menu">
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Affiliates</a></li>
                            <li><a href="#">Careers</a></li>
                            <li><a href="#">Privacy Plocy</a></li>
                            <li><a href="#">Terms of Use</a></li>
                            <li><a href="#">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-12 col-md-3">
                    <div class="form-newsletter">
                        <input placeholder="Please enter your email" class="form-newsletter-input" type="text">
                        <button class="form-newsletter-button">OK</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- footer paralax-->
    <div class="footer-row">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-3">
                    <div class="widget-container widget-contact-info">
                        <h3 class="widget-title">Infomation</h3>
                        <div class="widget-body">
                            <ul>
                                <li><a class="location" href="#"><span class="address">Address:</span>2046 Blue Spruce Lane Laurel, tetxac, Orton Tolanto, Canada</a></li>
                                <li><a class="phone" href="#"><span>Phone:</span>0200 410-369-3920</a></li>
                                <li><a class="mobile" href="#"><span>Hotline:</span> 090 999 8686</a></li>
                                <li><a class="email" href="#"><span>Email:</span>nfo@kutethemes.com</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 col-md-2">
                    <div class="widget-container">
                        <h3 class="widget-title">COMPANY</h3>
                        <div class="widget-body">
                            <ul>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Testimonials</a></li>
                                <li><a href="#">Affiliate Program</a></li>
                                <li><a href="#">Terms & Conditions</a></li>
                                <li><a href="#">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 col-md-2">
                    <div class="widget-container">
                        <h3 class="widget-title">my account</h3>
                        <div class="widget-body">
                            <ul>
                                <li><a href="#">My Orders</a></li>
                                <li><a href="#">My Credit Slips</a></li>
                                <li><a href="#">My Addresses</a></li>
                                <li><a href="#">My Personal Info</a></li>
                                <li><a href="#">Specials</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-2">
                    <div class="widget-container">
                        <h3 class="widget-title">SUPPORT</h3>
                        <div class="widget-body">
                            <ul>
                                <li><a href="#">Payments</a></li>
                                <li><a href="#">Saved Cards</a></li>
                                <li><a href="#">Shipping Free</a></li>
                                <li><a href="#">Cancellation</a></li>
                                <li><a href="#">Support Online</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="widget-container">
                        <h3 class="widget-title">Let's Socialize</h3>
                        <div class="widget-body">
                            <div class="footer-social">
                                <ul>
                                    <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a class="pinterest" href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                    <li><a class="vk" href="#"><i class="fa fa-vk"></i></a></li>
                                    <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a class="google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="widget-container">
                        <h3 class="widget-title">payment</h3>
                        <div class="widget-body">
                            <img src="assets-home/data/option7/payment.png" alt="Payment">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="footer-bottom-wapper">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="footer-coppyright">
                            Copyright © 2015 KuteShop. All Rights Reserved. Designed by: KuteThemes
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ./footer paralax-->
</footer>

<a href="#" class="scroll_top" title="Scroll to Top" style="display: inline;">Scroll</a>
<!-- Script-->
<script type="text/javascript" src="{{asset('assets-home/lib/jquery/jquery-1.11.2.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets-home/lib/bootstrap/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets-home/lib/select2/js/select2.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets-home/lib/jquery.bxslider/jquery.bxslider.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets-home/lib/owl.carousel/owl.carousel.min.js')}}"></script>
<!-- COUNTDOWN -->
<script type="text/javascript" src="{{asset('assets-home/lib/countdown/jquery.plugin.js')}}"></script>
<script type="text/javascript" src="{{asset('assets-home/lib/countdown/jquery.countdown.js')}}"></script>
<!-- ./COUNTDOWN -->
<script type="text/javascript" src="{{asset('assets-home/js/jquery.actual.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets-home/js/theme-script.js')}}"></script>
<script type="text/javascript" src="{{asset('assets-home/js/option4.js')}}"></script>
<script type="text/javascript" src="{{asset('assets-home/lib/jquery-ui/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets-home/js/jquery.actual.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets-home/js/theme-script.js')}}"></script>
<script type="text/javascript" src="{{asset('assets-home/lib/jquery.elevatezoom.js')}}"></script>
<script type="text/javascript" src="{{asset('assets-home/lib/fancyBox/jquery.fancybox.js')}}"></script>
<script type="text/javascript" src="{{asset('template-login/js/login-register.js')}}"></script>
<script type="text/javascript" src="{{asset('js/register_login.js')}}"></script>
<script type="text/javascript" src="{{asset('js/typeahead.bundle.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/search.js')}}"></script>
<script type="text/javascript" src="{{asset('js/rater.js')}}" charset="utf-8"></script>
<script type="text/javascript" src="{{asset('js/notify.js')}}" charset="utf-8"></script>
<script type="text/javascript" src="{{asset('js/wishlist.js')}}" charset="utf-8"></script>
<!-- Main JS-->
<script src="{{ asset('dist/js/main.min.js') }}"></script>
<script src="{{ asset('dist/js/custom.min.js') }}"></script>
{{--ckediter--}}
<script src="{{asset('vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
<script>
    CKEDITOR.replace( 'article-ckeditor' );
</script>
<script>
    $("#msg").show(0).delay(3000).hide(0);
</script>
@yield('script')
@yield('script-1')

{{--Chart JS--}}
<script type="text/javascript" src="{{asset('Highcharts/code/highcharts.js')}}"></script>
<script type="text/javascript" src="{{asset('Highcharts/code/modules/series-label.js')}}"></script>
<script type="text/javascript" src="{{asset('Highcharts/code/modules/exporting.js')}}"></script>
<script type="text/javascript" src="{{asset('Highcharts/code/modules/export-data.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/charts.js') }}"></script>


</body>

</html>
