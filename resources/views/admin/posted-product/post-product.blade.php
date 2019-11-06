@extends('admin.layouts.index')
@section('css')
    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked + .slider {
            background-color: #2196F3;
        }

        input:focus + .slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
    </style>
@endsection
@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <ul class="breadcrumbs">
                        <li class="nav-home">
                            <a href="#">
                                <i class="flaticon-home"></i>
                            </a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="#">Post Product</a>
                        </li>

                    </ul>
                </div>
{{--                @if(session('message-success'))--}}
{{--                    <div class="alert alert-success">{{session('message-success')}}</div>--}}
{{--                @endif--}}
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Post Product</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Modal -->
                            <div class="table-responsive mb-5 border-bottom-1">
                                <table id="add-row" class="display table table-striped table-hover" >
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Customer</th>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Price</th>
                                        <th>New</th>
                                        <th>Status</th>
                                        <th>Active</th>
                                        <th>Create At</th>
                                    </tr>
                                    </thead>
                                    <tbody id="product">
                                    @foreach($product as $post)
                                        <tr>
                                            <td>{{$post->id}}</td>
                                            <td>{{$post->customerName->name}}</td>
                                            <td>{{$post->name}}</td>
                                            @if(count($post->images)>0)
                                                <td>
                                                    <img width="60px" src="{{asset($post->images[0]->image_path)}}">
                                                </td>
                                            @else
                                                <td>
                                                    <img width="60px" src="{{asset('uploads/product_images/no-image.jpg')}}">
                                                </td>
                                            @endif
                                            <td>{{$post->price}}</td>
                                            <td>{{$post->new}}</td>
                                            <td>{{$post->status}}</td>
                                            <td>
                                                <label class="switch">
                                                    <input type="checkbox" class="switch-button" value="{{$post->id}}">
                                                    <span class="slider round"></span>
                                                </label>
                                            </td>
{{--                                            <td><input type="checkbox" class="get_value"--}}
{{--                                                       value="{{$post->id}}"--}}
{{--                                                       product_id="{{$post->id}}"--}}
{{--                                                       id="checkboxrequire"></td>--}}
                                            <td>{{$post->created_at}}</td>
                                        @endforeach
                                    </tbody>
                                </table>
                                <br/>
                                <div id="result"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $('.switch-button').change(function () {
                let product_id = jQuery(this).attr('value');
                // console.log(product_id)
                $.ajax({
                    url: "active-product",
                    method: "POST",
                    data: {'product_id' : product_id},
                    success: function (result) {
                        location.reload();
                        console.log(result);
                    }
                });
            });
        });
    </script>
    @endsection
