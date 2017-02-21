<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="/css/bootstrap.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="/css/font-awesome.css">

    <!-- Ionicons -->
    <link rel="stylesheet" href="/css/ionicons.min.css">

    <!-- iCheck -->
    <link rel="stylesheet" href="/css/square/green.css">

    <!-- Theme -->
    <link rel="stylesheet" href="/css/AdminLTE.css">
    <link rel="stylesheet" href="/css/skins/skin-green.css">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ __('nerus.title') }}</title>

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

</head>


<body class="hold-transition login-page">

<div class="login-box">
    <div class="login-logo">
        <a href="#">Nerus</a>
    </div>
    <div class="login-box-body">
        @yield('content')
    </div>
</div>

<!-- Scripts -->
<script src="/js/jquery.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="/plugins/fastclick/fastclick.js"></script>
<script src="/plugins/iCheck/icheck.min.js"></script>
<script src="/js/app.min.js"></script>
@yield('scripts')

</body>
</html>
