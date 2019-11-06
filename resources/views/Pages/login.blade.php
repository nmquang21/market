
<div class="center-container">
    <div class="main-content-agile">
        <div class="sub-main-w3">
            <div class="text-center">
                <h2>Login Quick</h2>
            </div>
            <div class="text-center col-md-4 col-md-offset-4">
                @include('notifications')
            </div>
            <form action="{{ route(CLIENT_LOGIN) }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <div class="form-group">
                            <label class="form-control-label">E-mail </label>
                            <input placeholder="E-mail" name="email" class="form-control" type="text"
                                   aria-describedby="basic-addon1">
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
                <div class="text-center">
                    <button type="submit" class="btn btn-success btn-sm">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>


