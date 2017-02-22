@extends('layouts.login')

@section('content')

    <p class="login-box-msg">{{ __('auth.reset_password_title') }}</p>

    @if ($errors->has('email'))
    <div class="alert alert-danger">{{ $errors->first('email') }}</div>
    @endif

    <form method="POST" role="form" action="{{ route('password.email') }}">
        {{ csrf_field() }}
        <div class="form-group has-feedback">
            <input id="email" type="email" name="email" class="form-control" placeholder="{{ __('auth.email') }}">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>

        <div class="row">
            <div class="col-xs-6"><a class="btn btn-danger form-control" href="{{ route('login') }}">{{ __('common.back') }}</a></div>
            <div class="col-xs-6"><button type="submit" class="btn btn-primary form-control">{{ __('auth.reset_password_title') }}</button></div>
        </div>
    </form>

    <div class="social-auth-links text-center">
        <p>- {{ __('auth.or') }} -</p>

        @foreach (\Config::get('app.locale_flags') as $key => $value)
            @if (\Session::get('language') != $key)
                <a href="{{ route('language', $key) }}" class="btn btn-block btn-social {{ $value }} btn-flat"><i
                            class="fa fa-flag"></i> {{ __('auth.'.$key) }}</a>
            @endif
        @endforeach
    </div>

@endsection
