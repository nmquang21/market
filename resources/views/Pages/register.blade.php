@extends('Pages.layouts.main')

@section('content')
<div class="center-container">
    <div class="main-content-agile">
        <div class="form-group">
            <div class="text-center">
                <h2>Register Account</h2>
            </div>
            <div class="text-center col-md-4 col-md-offset-4">
                @include('notifications')
            </div>
            <form action="{{ route(CLIENT_REGISTER) }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <div class="form-group">
                            <label class="form-control-label">Full Name </label>
                            <input placeholder="Full name" name="name" class="form-control" type="text"
                                   aria-describedby="basic-addon1" value="{{ old('name') ?? '' }}">
                            @if(!empty($errors->has('name')))
                                <span class="message-validate">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <div class="form-group">
                            <label class="form-control-label">E-mail </label>
                            <input placeholder="E-mail" name="email" class="form-control" type="text"
                                   aria-describedby="basic-addon1" value="{{ old('email') ?? '' }}">
                            @if(!empty($errors->has('email')))
                                <span class="message-validate">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <div class="form-group">
                            <label class="form-control-label">Password </label>
                            <input placeholder="password" name="password" class="form-control" type="password"
                                   aria-describedby="basic-addon1">
                            @if(!empty($errors->has('password')))
                                <span class="message-validate">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <div class="form-group">
                            <label class="form-control-label">Retype password </label>
                            <input placeholder="Retype password" name="passwordAgain" class="form-control" type="password"
                                   aria-describedby="basic-addon1">
                            @if(!empty($errors->has('passwordAgain')))
                                <span class="message-validate">{{ $errors->first('passwordAgain') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-success btn-sm">Register</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

