@extends('layouts.login')

@section('content')

    <p class="login-box-msg">{{ __('auth.sign_in') }}</p>

    @if (isset($error))
        <div class="alert alert-danger">{{ __('auth.wrong_password') }}</div>
    @endif

    <form method="POST" role="form" action="{{ route('login') }}">
        {{ csrf_field() }}
        <div class="form-group has-feedback">
            <input id="email" type="email" class="form-control" placeholder="{{ __('auth.email') }}"
                   value="{{ old('email') }}" required autofocus>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <input id="password" type="password" class="form-control" placeholder="{{ __('auth.password') }}"
                   name="password" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>

        <div class="row">
            <div class="col-xs-8">
                <div class="checkbox icheck"><label><input type="checkbox" {{ old('remember') ? 'checked' : '' }}>
                        &nbsp; {{ __('auth.remember_me') }}</label></div>
            </div>
            <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">{{ __('auth.login') }}</button>
            </div>
        </div>

    </form>

    <div class="social-auth-links text-center">
        <p>- {{ __('auth.or') }} -</p>
        <a href="{{ route('password.request') }}" class="btn btn-block btn-social btn-flat"><i
                    class="fa fa-key"></i> {{ __('auth.reset_password') }}</a>

        @foreach (\Config::get('app.locale_flags') as $key => $value)
            @if (\Session::get('language') != $key)
            <a href="{{ route('language', $key) }}" class="btn btn-block btn-social {{ $value }} btn-flat"><i
                        class="fa fa-flag"></i> {{ __('auth.'.$key) }}</a>
            @endif
        @endforeach

    </div>

@endsection

@section('scripts')
    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
                increaseArea: '20%'
            });
        });
    </script>
@endsection