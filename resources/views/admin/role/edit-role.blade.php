@extends('admin.layouts.index')

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
                @if($errors->any())
                <div class="alert alert-danger">{{$errors->first()}}</div>
                @endif
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{route('admin.role.update',$role->id)}}" method="POST">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Edit User</div>
                                </div>
                                <div class="card-body">

                                    @csrf
                                    <input name="id" value="{{$role->id}}" hidden>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input class="form-control" name="name" value="{{$role->name}}">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="email">Quyền</label>
                                            {{--<!-- @if($allPermit->count())
                                            @foreach($allPermit as $ap)
                                                <input type="checkbox" class="form-control" {{in_array($ap->name,$allNamePermit)?'checked':''}} value="{{$ap->id}}" name="permission[]" >
                                            {{$ap->name}} <br/>
                                            @endforeach
                                            @endif -->--}}


                                            <div class="selectgroup selectgroup-pills">
                                                @if($allPermit->count())
                                                @foreach($allPermit as $ap)
                                                <label class="selectgroup-item">

                                                    <input id="per-{{$ap->id}}" {{in_array($ap->name,$allNamePermit)?'checked="checked"':''}} type="checkbox" name="permission[]" value="{{$ap->id}}" class="selectgroup-input" >
                                                    <span class="selectgroup-button">{{$ap->name}}</span>
                                                </label>
                                                @endforeach
                                                @endif
                                            </div>


                                        </div>
                                    </div>

                                </div>
                                <div class="card-action">
                                    <a href="{{route('admin.role.index')}}"><button type="button" class="btn btn-danger">Cancel</button></a>
                                    <button type="submit" class="btn btn-success">Submit</button>
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
