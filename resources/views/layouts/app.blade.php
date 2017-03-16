<!DOCTYPE html>
<html lang="{{ \Session::get('language') }}">
<head>

    <!-- METAS -->
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

    <!-- FamFamFam Flags -->
    <link rel="stylesheet" href="/css/flags/famfamfam-flags.css">

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

<body class="hold-transition skin-green sidebar-mini sidebar-collapse">

<div id="wrapper">

    <header class="main-header">

        <a href="{{ route('home') }}" class="logo">
            <span class="logo-mini">N</span>
            <span class="logo-lg">Nerus</span>
        </a>

        <nav class="navbar navbar-static-top">
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle Navigation</span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">

                    @foreach (\Config::get('app.locale_flags') as $key => $value)
                        <li>
                            <a href="{{ route('language', $key) }}">
                                <i class="{{ $value }}"></i>
                                @if (\Session::get('language') == $key) <span
                                        class="label label-success">✓</span> @endif
                            </a>
                        </li>
                    @endforeach

                    <li class="dropdown messages-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-exclamation-triangle"></i>
                            <span class="label label-danger">4</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">4 messages</li>
                            <li>
                                <ul class="menu">
                                    <li>
                                        <a href="#">
                                            <div class="pull-left">
                                                <img src="http://m.c.lnkd.licdn.com/mpr/mpr/shrinknp_100_100/p/8/005/01e/105/25bbe2d.jpg"
                                                     class="img-circle"
                                                     alt="User Image">
                                            </div>
                                            <h4>Filipe Neves</h4>
                                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                            <p>Testing...</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer"><a href="#">See all messages</a></li>
                        </ul>
                    </li>

                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="http://m.c.lnkd.licdn.com/mpr/mpr/shrinknp_100_100/p/8/005/01e/105/25bbe2d.jpg"
                                 class="user-image" alt="User Image">
                            <span class="hidden-xs">Filipe Neves</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="user-header">
                                <img src="http://m.c.lnkd.licdn.com/mpr/mpr/shrinknp_100_100/p/8/005/01e/105/25bbe2d.jpg"
                                     class="img-circle" alt="User Image">
                                <p>Filipe Neves
                                    <small>IT Manager</small>
                                </p>
                            </li>
                            <li class="user-body">
                                <div class="row">
                                    <div class="col-xs-4 text-center"><a href="#">Orders</a></div>
                                    <div class="col-xs-4 text-center"><a href="#">Notifications</a></div>
                                    <div class="col-xs-4 text-center"><a href="#">Feedback</a></div>
                                </div>
                            </li>
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="#"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                       class="btn btn-default btn-flat">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>

        </nav>

    </header>

    <aside class="main-sidebar">
        <section class="sidebar">
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i
                                class="fa fa-search"></i></button>
                </span>
                </div>
            </form>

            @include('layouts.parts.menu')

        </section>
    </aside>

    <div class="content-wrapper">
        <section class="content-header">
            @yield('title')
            @yield('breadcrumbs')
        </section>

        <section class="content">
            @if (count($errors->all()))
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i> {{ __('validation.error') }}</h4>
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif
            @yield('content')
        </section>
    </div>

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>{{ __('common.version') }}</b> {{ \Config('app.version') }} <a href="#">
                <small class="text-gray">{{ __('common.see_changelog') }}</small>
            </a>
        </div>
        <strong>{{ __('nerus.copyright') }}</strong>
    </footer>

</div>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>


<!-- Scripts -->
<script src="/js/jquery.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="/plugins/fastclick/fastclick.js"></script>
<script src="/js/app.min.js"></script>
@yield('scripts')

</body>
</html>
