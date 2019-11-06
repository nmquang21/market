@extends('admin.layouts.index')
<style>
    input[type="file"] {
        display: none;
    }
    .custom-file-upload {
        margin-top: 25px;
        border: 1px solid #ccc;
        display: inline-block;
        padding: 6px 12px;
        cursor: pointer;
    }
    .form-group {
        padding: 4px !important;
    }

    .form-group.form-inline label{
        text-align: left;
        display: block;
    }
    .butt{
        margin-top: 30px;
    }
    /*.card-body {*/
    /*    height: auto !important;*/
    /*}*/
</style>

@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">My Profile</h4>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        @if($errors->any())
                            <div class="alert alert-danger" style="background-color: coral">{{$errors->first()}}</div>
                        @endif
                        @if(session('message-success'))
                            <div class="alert alert-success" style="background-color: cyan">{{session('message-success')}}</div>
                        @endif
                    </div>
                    <div class="col-md-12">
                        <form method="post" enctype="multipart/form-data" action="{{route('admin.user.update-infor')}}">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Details</h4>
                            </div>
                            <div class="card-body">
                                <div class="col-md-3 float-left">
                                    <div class="avatar avatar-xxl">
                                        @if(isset($user->avatar))
                                            <img id="blah" src="{{asset($user->avatar)}}" alt="..." class="avatar-img rounded-circle">
                                        @else
                                            <i style="font-size: 120px" class="fas fa-user"></i>
                                        @endif
                                    </div>
                                    <div>
                                        <label for="file-upload" class="custom-file-upload">
                                            <i class="fas fa-upload"></i> Change Avatar
                                        </label>
                                        <input name="avatar" id="file-upload" type="file"/>
                                    </div>
                                </div>
                                <div class="col-md-2 float-left">
                                    <p class="label">Your roles</p>
                                    @foreach($nameOfRoles as $r)
                                    <span style="margin-bottom: 2px" class="badge badge-pill badge-info">{{$r}}</span><br>
                                    @if($r=='admin')
                                    <span>Full permission</span>
                                    @endif
                                    @endforeach
                                </div>
                                <div class="col-md-7 float-left">
                                    <div class="form-group form-inline">
                                        <label for="name" class="col-md-3 col-form-label">Name</label>
                                        <div class="col-md-9 p-0">
                                            <input name="name" type="text" value="{{$user->name}}" class="form-control input-full" id="name" placeholder="Type Name">
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="email" class="col-md-3 col-form-label">Email</label>
                                        <div class="col-md-9 p-0">
                                            <input readonly type="text" value="{{$user->email}}" class="form-control input-full" id="email" placeholder="Type Email">
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label class="col-md-3 col-form-label">Create date</label>
                                        <div class="col-md-9 p-0">
                                            <input readonly type="text" value="{{\Carbon\Carbon::parse($user->created_at)->format('d-m-Y')}}" class="form-control input-full" >
                                        </div>
                                    </div>
                                    <div class="butt pull-right">
                                        <div class="input-group-prepend">
                                            <input class="btn btn-default btn-border" value="Update" type="submit">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                    <div class="col-md-12">
                        <form method="post" action="{{route('admin.user.update-pass')}}">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Update Password</h4>
                            </div>
                            <div class="card-body">
                                <div class="col-md-6 float-left">
                                    <div class="form-group form-inline">
                                        <label class="col-md-4 col-form-label">Current password</label>
                                        <div class="col-md-8 p-0">
                                            <input name="currentPass" type="password" class="form-control input-full" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 float-left">
                                    <div class="form-group form-inline">
                                        <label class="col-md-4 col-form-label">New password</label>
                                        <div class="col-md-8 p-0">
                                            <input name="password" type="password" class="form-control input-full" >
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label class="col-md-4 col-form-label">Confirm password</label>
                                        <div class="col-md-8 p-0">
                                            <input name="password_confirmation" type="password" class="form-control input-full" >
                                        </div>
                                    </div>
                                    <div class="butt pull-right">
                                        <div class="input-group-prepend">
                                            <input class="btn btn-default btn-border" value="Update" type="submit">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        </form>
                    </div>
<!--                    <div class="col-md-12">-->
<!--                        <div class="card">-->
<!--                            <div class="card-header">-->
<!--                                <h4 class="card-title">Shape</h4>-->
<!--                            </div>-->
<!--                            <div class="card-body">-->
<!---->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
                </div>
            </div>
        </div>

        @include('admin.layouts.footer')
    </div>
    @endsection


@section('script')
    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    jQuery('#blah').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        jQuery('#file-upload').change(function () {
            readURL(this);
        });

    </script>

    <!--Doan nay de popup error-->
    <script type="text/javascript">
        $('#alert_demo_3_2').click(function(e) {
            swal("Good job!", "You clicked the button!", {
                icon : "error",
                buttons: {
                    confirm: {
                        className : 'btn btn-danger'
                    }
                },
            });
        });
    </script>
    @if(session()->has('message'))
    <!--Doan nay de popup success-->
    <script type="text/javascript">
        var SweetAlert2Demo = function() {
            var initDemos = function () {
                function (e) {
                    swal("{{ session()->get('message') }}", "You clicked the button!", {
                        icon: "success",
                        buttons: {
                            confirm: {
                                className: 'btn btn-success'
                            }
                        },
                    });
                }
            };
            return {
                //== Init
                init: function () {
                    initDemos();
                },
            };
        }();
        //== Class Initialization
        jQuery(document).ready(function() {
            SweetAlert2Demo.init();
        });
    </script>
    @endif
@endsection
