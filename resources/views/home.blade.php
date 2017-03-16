@extends('layouts.app')

@include('layouts.parts.page_title', ['title' => __('profile.user_profile'), 'description' => __('profile.user_profile_description')])
@include('layouts.parts.breadcrumbs', ['breadcrumbs' => [0 => ['text' => __('profile.users'), 'icon' => 'fa fa-user', 'route' => route('user.index'), 'active' => 0]]])

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Registered Users</div>

                <div class="panel-body">

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
