@extends('Pages.layouts.main')
@section('top-menu')
    @include('Pages.layouts.top-menu-homepage')
@endsection

@section('content')
    @include('Pages.layouts.home-slider')
    @include('Pages.layouts.product-homepage')
@endsection
@section('script')
    <script>
        jQuery(document).ready(function () {
            jQuery('#list-cate').css('display','block')
        })

    </script>
    @endsection
