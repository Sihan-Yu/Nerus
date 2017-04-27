<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>BergJet</title>

    <!-- core CSS -->
    <link href="web/css/bootstrap.min.css" rel="stylesheet">
    <link href="web/css/font-awesome.min.css" rel="stylesheet">
    <link href="web/css/animate.min.css" rel="stylesheet">
    <link href="web/css/prettyPhoto.css" rel="stylesheet">
    <link href="web/css/main.css" rel="stylesheet">
    <link href="web/css/responsive.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/flags/famfamfam-flags.css">

    <!--[if lt IE 9]>
    <script src="web/js/html5shiv.js"></script>
    <script src="web/js/respond.min.js"></script>
    <![endif]-->

    <link rel="shortcut icon" href="web/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="web/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="web/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="web/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="web/images/ico/apple-touch-icon-57-precomposed.png">

</head>

<body class="homepage">

<header id="header">

    @include('web.parts.topbar')

    <nav class="navbar navbar-inverse" role="banner">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html"><img src="../images/logo.png" alt="logo"></a>
            </div>

            <div class="collapse navbar-collapse navbar-right">
                <ul class="nav navbar-nav">
                    <li><a href="{{ route('home') }}">{{ __('web.about_us') }}</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ __('web.industries') }}</i>
                            &nbsp; <i class="fa fa-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">{{ __('web.marine') }}</a></li>
                            <li><a href="#">{{ __('web.energy') }}</a></li>
                            <li><a href="#">{{ __('web.industry') }}</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ route('web.contacts') }}">{{ __('web.products') }}</a></li>
                    <li><a href="{{ route('web.contacts') }}">{{ __('web.hyper_jet_series') }}</a></li>
                    <li><a href="{{ route('web.contacts') }}">{{ __('web.atex_fans') }}</a></li>
                    <li><a href="{{ route('web.contacts') }}">{{ __('web.contacts') }}</a></li>

                    <!-- Languages -->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                                    class="{{ \Config::get('app.locale_flags')[\Session::get('language')] }}"></i>
                            &nbsp; <i class="fa fa-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            @foreach (\Config::get('app.locale_flags') as $key => $value)
                                @if (\Session::get('language') != $key)
                                    <li>
                                        <a href="{{ route('language', $key) }}">
                                            <i class="{{ $value }}"></i> &nbsp;&nbsp; {{ __('auth.' . $key) }}
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

</header>

@yield('content')

@include('web.parts.bottom')

@include('web.parts.footer')

<script src="web/js/jquery.js"></script>
<script src="web/js/bootstrap.min.js"></script>
<script src="web/js/jquery.prettyPhoto.js"></script>
<script src="web/js/jquery.isotope.min.js"></script>
<script src="web/js/main.js"></script>
<script src="web/js/wow.min.js"></script>
@yield('scripts')

</body>
</html>