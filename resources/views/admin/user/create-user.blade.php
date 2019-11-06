@extends('admin.layouts.index')
<style rel="stylesheet" >
    @import url('//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css');

    .info-msg,
    .success-msg,
    .warning-msg,
    .error-msg {
        margin: 8px 0;
        padding: 5px;
        border-radius: 3px 3px 3px 3px;
    }
    .info-msg {
        color: #059;
        background-color: #BEF;
    }
    .success-msg {
        color: #270;
        background-color: #DFF2BF;
    }
    .warning-msg {
        color: #9F6000;
        background-color: #FEEFB3;
    }
    .error-msg {
        color: #D8000C;
        background-color: #FFBABA;
    }
</style>
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
                            <a href="#">User</a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="#">Edit User</a>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="list-unstyled">
                                    @foreach ($errors->all() as $error)
                                        <div class="error-msg">
                                            <i class="fa fa-times-circle"></i>
                                            {{$error}}
                                        </div>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{route('admin.user.store')}}" method="POST">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Create User</div>
                                </div>
                                <div class="card-body">
                                    @csrf
                                    <div class="col-sm-12">
                                        <div class="form-group form-floating-label">
                                            <input name="name" id="inputFloatingLabel2" type="text" class="form-control input-border-bottom" >
                                            <label for="inputFloatingLabel2" class="placeholder">Full Name</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group form-floating-label">
                                            <input name="email" id="inputFloatingLabel" type="text" class="form-control input-border-bottom" >
                                            <label for="inputFloatingLabel" class="placeholder">Email</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group form-floating-label">
                                            <input name="password" id="inputFloatingLabel" type="password" class="form-control input-border-bottom" >
                                            <label for="inputFloatingLabel" class="placeholder">Password</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group form-floating-label">
                                            <input name="password_confirmation" id="inputFloatingLabel" type="password" class="form-control input-border-bottom" >
                                            <label for="inputFloatingLabel" class="placeholder">Confirm Password</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Role</label>
                                            <div class="selectgroup selectgroup-pills">
                                                @foreach($roles as $r)
                                                <label class="selectgroup-item">
                                                    <input id="role-{{$r->id}}" type="checkbox" name="roles[]" value="{{$r->id}}" class="selectgroup-input" >
                                                    <span class="selectgroup-button">{{$r->name}}</span>
                                                </label>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-action">
                                    <a href="{{route('admin.user.index')}}"><button type="button" class="btn btn-danger">Cancel</button></a>
                                    <button type="submit" class="btn btn-success">Create</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @include('admin.layouts.footer')
    </div>


    @endsection
