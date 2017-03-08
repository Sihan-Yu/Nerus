@extends('layouts.app')

@include('layouts.parts.page_title', ['title' => __('profile.user_profile'), 'description' => __('profile.user_profile_description', ['name' => $user->name])])
@include('layouts.parts.breadcrumbs', ['breadcrumbs' => [0 => ['text' => __('profile.users'), 'icon' => 'fa fa-user', 'route' => route('user.index'), 'active' => 0], 1 => ['text' => $user->name, 'icon' => '', 'route' => route('user.view', $user->id), 'active' => 1]]])

@section('content')

    @if (isset($created))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> {{ __('validation.success') }}</h4>
            <p>{{ __('profile.created_successfully') }}</p>
        </div>
    @endif

    <div class="row">
        <div class="col-md-3">

            <div class="box box-primary">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle"
                         src="http://m.c.lnkd.licdn.com/mpr/mpr/shrinknp_100_100/p/8/005/01e/105/25bbe2d.jpg"
                         alt="User profile picture">

                    <h3 class="profile-username text-center">{{ $user->name }}</h3>
                    <p class="text-muted text-center">Department</p>

                    <ul class="list-group list-group-unbordered">

                        <li class="list-group-item">
                            <b>Orders</b> <a class="pull-right">1111</a>
                        </li>

                        <li class="list-group-item">
                            <b>Since</b> <a class="pull-right">{{ $user->created_at }}</a>
                        </li>

                    </ul>

                    <a href="#" class="btn btn-primary btn-block">Send Message</a>
                </div>

            </div>

            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">About me</h3>
                </div>

                <div class="box-body">
                    <strong><i class="fa fa-book margin-r-5"></i> {{ __('profile.education') }}</strong>
                    <p class="text-muted">B.S. in Whatever</p>

                    <hr>

                    <strong><i class="fa fa-map-marker margin-r-5"></i> {{ __('profile.location') }}</strong>
                    <p class="text-muted">Ningbo</p>
                </div>
            </div>

        </div>

        <div class="col-md-9">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#timeline" data-toggle="tab">Timeline</a>
                    </li>
                    <li>
                        <a href="#settings" data-toggle="tab">Orders</a>
                    </li>
                    <li>
                        <a href="#settings" data-toggle="tab">Information</a>
                    </li>
                    <li>
                        <a href="#change_password" data-toggle="tab">Password</a>
                    </li>
                </ul>
            </div>
        </div>

    </div>

@endsection