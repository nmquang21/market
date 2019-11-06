@extends('Pages.layouts.main')
@section('top-menu')
    @include('Pages.layouts.top-menu-homepage')
@endsection

@section('content')
    @include('Pages.layouts.category-content')
    {{--    @include('Pages.layouts.product-homepage')--}}
@endsection
