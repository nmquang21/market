@extends('layouts.app')
@section('slide')
    @include('slide')
@endsection
@section('content')

    @if(!Auth::check())
        <div class="container mt-1 mb-4" >
            <div class="row bg-white content-homepage p-3">
               <div class="col-6">
                   <img src="images/sub-banner.png">
               </div>
                <div class="col-6 text-center">
                    <div style="color:#ba8b00"><strong>Đăng nhập để không bỏ lỡ món hời giá tốt!</strong></div>
                    <div class="m-1">
                        <a href="{{ route('login') }}"><button class="btn btn-primary"><strong class="text-white">Đăng nhập ngay</strong></button></a>
                    </div>
                    <div class="m-1">
                        <a href="{{ route('register') }}" style="font-size: 14px">Đăng kí tài khoản</a>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="container mt-1" >
        <div class="row bg-white content-homepage">
            <div class="m-3" style="font-weight: 600;">
                Khám Phá Danh Mục
            </div>
            <div class="row m-2">
                <a class="col-6  item-cate" href="#" >
                    <div class="card text-center">
                        <div class="card-header bg-info text-white">
                            Bất Động Sản
                        </div>
                        <div class="card-body p-0">
                            <div>
                                <img width=100% height="200px" src="images/Landmark.jpg">
                                <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                            </div>
                        </div>
                    </div>
                </a>
                <a class="col-6 item-cate" href="login">
                    <div class="card text-center">
                        <div class="card-header bg-danger text-white">
                            Xe Cộ
                        </div>
                        <div class="card-body p-0">
                            <div class="">
                                <img width=100% height="200px" src="images/835858af78da3af.jpg">
                                <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                            </div>
                        </div>
                    </div>
                </a>
                <div class="col-sm-6 col-md-3 mt-4">
                    <div class="card text-center">
                        <div class="card-header bg-warning text-white">
                           Đồ Điện tử
                        </div>
                        <div class="card-body p-0">
                            <div class="">
                                <img width=100% height="200px" src="images/dientu.jpg">
                                <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 mt-4">
                    <div class="card text-center">
                        <div class="card-header bg-success text-white">
                            Việc Làm
                        </div>
                        <div class="card-body p-0">
                            <div class="">
                                <img width=100% height="200px" src="images/personal-kanban.jpg">
                                <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 mt-4">
                    <div class="card text-center">
                        <div class="card-header bg-dark text-white">
                            Thú Cưng
                        </div>
                        <div class="card-body p-0">
                            <div class="">
                                <img width=100% height="200px" src="images/thu-cung-1030x773.jpg">
                                <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 mt-4">
                    <div class="card text-center">
                        <div class="card-header  text-white" style="background-color: #9561e2">
                            Đồ gia dụng
                        </div>
                        <div class="card-body p-0">
                            <div class="">
                                <img width=100% height="200px" src="images/the-gioi-do-gia-dung-min.jpg">
                                <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 mt-4">
                    <div class="card text-center">
                        <div class="card-header text-white" style="background-color: #533f03">
                            Giải trí, Thể thao
                        </div>
                        <div class="card-body p-0">
                            <div class="">
                                <img width=100% height="200px" src="images/Entertainment.jpg">
                                <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 mt-4">
                    <div class="card text-center">
                        <div class="card-header  text-white"style="background-color: #6cb2eb">
                            Thời trang, Đồ cá nhân
                        </div>
                        <div class="card-body p-0">
                            <div class="">
                                <img width=100% height="200px" src="images/thoi-trang-han-quoc-696x521.png">
                                <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 mt-4">
                    <div class="card text-center">
                        <div class="card-header text-white" style="background-color: #e4606d">
                            Mẹ và Bé
                        </div>
                        <div class="card-body p-0">
                            <div class="">
                                <img width=100% height="200px" src="images/me-va-be.jpg">
                                <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 mt-4">
                    <div class="card text-center">
                        <div class="card-header text-white" style="background-color: #ffe924">
                            Dịch vụ, Du lịch
                        </div>
                        <div class="card-body p-0">
                            <div class="">
                                <img width=100% height="200px" src="images/21e_1548215577665.jpg">
                                <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 mt-4">
                    <div class="card text-center">
                        <div class="card-header text-white" style="background-color: #2fa360">
                            Cho tặng, Miễn phí
                        </div>
                        <div class="card-body p-0">
                            <div class="">
                                <img width=100% height="200px" src="images/intro.jpg">
                                <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 mt-4">
                    <div class="card text-center">
                        <div class="card-header text-white" style="background-color: coral">
                            Tất cả danh mục
                        </div>
                        <div class="card-body p-0">
                            <div class="">
                                <img width=100% height="200px" src="images/shopping_trolly.png">
                                <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
