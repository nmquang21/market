<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Market</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="icon" href="{{asset('shopping-basket.png')}}">
    <style>
        body{
            background-image: url("images/bg-01.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>
<body>
        <nav class="navbar navbar-expand-md navbar-light shadow-sm header-menu" >
            <div class="container">
                <a class="navbar-brand" href="{{ url('/homepage') }}">
                    <img height="45px" class="logo-top" src="shopping-basket.png">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span><i class="fas fa-bars text-white" style="font-size: 25px"></i></span>
                </button>

                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="seach"><i class="fas fa-search"></i>&nbsp;Tìm Kiếm</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="far fa-bell"></i>&nbsp;Thông Báo
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <div style="width: 350px; overflow: hidden">
                                    <h5 class="text-center">Thông Báo</h5>
                                    <hr>
                                    <div class="dropdown-item">
                                        <div class="row">
                                            <div class="col-2">
                                                <img width="50px" style="border: 1px solid #e4606d; border-radius: 50%"  src="h2.png">
                                            </div>
                                            <div class="col-8">
                                                <div>Quang</div>
                                                <div>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</div>
                                                <div>02/01/1999</div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>

                                </div>

                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login"><i class="far fa-comment"></i>&nbsp;Chat</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="far fa-meh"></i>&nbsp;Tôi Bán</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-h"></i>&nbsp;Thêm
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" >


{{--                                    @guest--}}
{{--                                        <div class="dropdown-item">--}}
{{--                                            <a class="dropdown-item" href="{{ route('login') }}">{{ __('Login') }}</a>--}}
{{--                                        </div>--}}
{{--                                        @if (Route::has('register'))--}}
{{--                                            <div class="dropdown-item">--}}
{{--                                                <a class="dropdown-item" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
{{--                                            </div>--}}
{{--                                        @endif--}}
{{--                                    @else--}}
                                    <div class="dropdown-item">
                                        <span>
                                            <img  style="width: 70px" src="h2.png">
                                        </span>
{{--                                        {{Auth::user()->name}}--}}aaaaaaaaaaaaaaaaa
                                    </div>
                                    <hr>
                                    <a class="dropdown-item" style="color: #e4606d" href="login">
                                        <i class="fas fa-pager" style="color: #1d68a7; font-size: 23px"></i>&nbsp;Trang cá nhân
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-star-half-alt" style="color: #2fa360; font-size: 23px"></i>&nbsp;Điểm thưởng:
                                    </a>
                                <hr>
                                    <a class="dropdown-item p-3" href="#">
                                        <i class="fas fa-heart" style="color: red; font-size: 23px"></i>&nbsp&nbsp;Tin đã lưu
                                    </a>
                                    <a class="dropdown-item p-3" href="#">
                                        <i class="fas fa-donate" style="color: #ba8b00; font-size: 23px"></i>&nbsp&nbsp;Tài khoản
                                    </a>
                                    <a class="dropdown-item p-3" href="#">
                                        <i class="fas fa-file-invoice-dollar" style="color: #491217; font-size: 23px"></i>&nbsp&nbsp;Lịch sử giao dịch
                                    </a>
                                    <a class="dropdown-item p-3" href="#">
                                        <i class="fas fa-store" style="color: #9561e2; font-size: 23px"></i>&nbsp&nbsp;Tạo của hàng/Chuyên trang
                                    </a>
                                    <hr>
                                    <a class="dropdown-item p-3" href="#">
                                        <i class="fas fa-user-cog" style="color: #491217; font-size: 23px"></i>&nbsp&nbsp;Cài đặt thông tin
                                    </a>
                                    <div class="dropdown-item p3">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                                 document.getElementById('logout-form').submit();">
                                            <i class="fas fa-sign-out-alt"></i>Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
{{--                                    @endguest--}}
                            </div>
                        </li>
                        <a style="line-height: 47px; margin-left: 5px">
                            <button class="btn btn-warning">Đăng Tin</button>
                        </a>
                        <!-- Authentication Links -->

                    </ul>
                </div>
            </div>
        </nav>
        <section style="margin-top: 56px">
            @yield('slide')


            <main >
                @yield('content')
            </main>
        </section>

        <div id="back-to-top" class="back-to-top">
            <img width="45px" src="images/top.png">
        </div>
    <footer class="mt-5" style="position: relative; bottom: 0" >
        <div class="pt-4"style="background-color: #495057">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-4 p-4">
                        <div><img width="70px" src="shopping-basket.png"></div>
                        <div>Market</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-dark text-white p-2 text-center">
            <div>Copyright ©2019 All rights reserved</div>
        </div>
    </footer>
</body>

<script src="js/jquery-3.4.1.min.js"></script>
{{--<script src="js/bootstrap.min.js"></script>--}}
<script>
    jQuery(document).ready(function () {
        //back-to-top
        jQuery('#back-to-top').click(function () {
            jQuery('html').animate({scrollTop:0},'slow');
        })
        jQuery(window).scroll(function () {
            var y = jQuery(window).scrollTop();
            if(y>200){
                jQuery('#back-to-top').fadeIn(200);
            }
            else{
                //jQuery('#back-to-top').hide(100);
                jQuery('#back-to-top').fadeOut(200);
            }
        });
    })
</script>
@yield('script')
</html>
