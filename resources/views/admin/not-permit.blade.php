@extends('admin.layouts.index')

@section('content')

    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <h4>Bạn không có quyền truy cập trang này!</h4>
<!--                <a href="/admin/dashboard">Click để quay lại</a>-->
            </div>
        </div>
    </div>

    @include('admin.layouts.footer')


    @endsection
