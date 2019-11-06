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
       <style>
               body{
                   background-image: url("images/bg-01.jpg");
                   background-repeat: no-repeat;
                   background-size: cover;
               }
           </style>
</head>
<body>
<div class="container">
    <div style="width: 45%; margin: 126px auto 0;box-shadow: 0px 0px 15px 0px; border-radius:5px">
        <div class="card">
            <div class="card-header bg-info text-white">
                <div style="font-size: 20px">Đăng Nhập</div>
            </div>

            @if(session('thongbao'))
                <div class="alert alert-danger">{{session('thongbao')}}</div>
                @endif
            <form method="POST" action="login-page">
                @csrf
                <div class="card-body" style="background-color: rgba(230,230,230,0.3)">
                    <div>
                        <label for="username">Email:</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <div class="mt-3">
                        <label for="password">Mật khẩu:</label>
                        <a  class="label-link" ; color: #0366d6; font-size: 12px"></a>
                         @if (Route::has('password.request'))
                            <a style="float: right;" class="btn btn-link" href="{{ route('password.request') }}">
                               Quên mật khẩu?
                            </a>
                        @endif
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <div class="mt-4">
                        <input type="checkbox"  name="remember" id="remember" class=" form-input" {{ old('remember') ? 'checked' : '' }}>
                        <label for="username">Ghi nhớ tài khoản?</label>
                    </div>
                    <div class="mt-2 text-center">
                            <a id="google_login" class="google" href="{{route('facebook.login')}}">
                               <button type="button" class="btn btn-primary"> <i style="font-size:20px"class="fab fa-facebook-square"></i>&nbsp;<span>Đăng nhập bằng Facebook</span>
                                </button>
                            </a>
                            <a id="google_login" class="google" href="{{route('google.login')}}">
                               <button type="button" class="btn btn-danger"> <i style="font-size:20px"class="fab fa-google-plus-square"></i>&nbsp;Đăng nhập bằng Google
                                </button>
                            </a>
                    </div>
                </div>
                <div class="card-footer">
                    <div style="display:flex;justify-content: flex-end">
                        <button type="submit" class="btn btn-success">Đăng Nhập</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>

<script src="js/jquery-3.4.1.min.js"></script>
</html>
