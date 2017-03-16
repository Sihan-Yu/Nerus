@extends('layouts.app')

@include('layouts.parts.page_title', ['title' => __('permissions.permissions'), 'description' => __('permissions.permissions_description')])
@include('layouts.parts.breadcrumbs', ['breadcrumbs' => [0 => ['text' => __('permissions.permissions'), 'icon' => 'fa fa-hand-paper-o', 'route' => route('permissions.index'), 'active' => 1], 0 => ['text' => __('permissions.permissions'), 'icon' => 'fa fa-hand-paper-o', 'route' => route('permissions.index'), 'active' => 0], 1 => ['text' => __('permissions.role_' . $role->name), 'icon' => '', 'route' => route('permissions.index'), 'active' => 1]]])

@section('content')


    <div class="row">
        <div class="col-md-3">
            <div class="box box-success">
                <div class="box-body box-profile">

                    <h3 class="profile-username text-center">{{ __('permissions.role_'.$role->name) }}</h3>
                    <br/>

                    <ul class="list-group list-group-unbordered">

                        <li class="list-group-item">
                            <b>Created on</b> <a class="pull-right">{{ $role->created_at }}</a>
                        </li>

                        <li class="list-group-item">
                            <b>Users</b> <a class="pull-right">123123</a>
                        </li>

                        <li class="list-group-item">
                            <b>Permissions</b> <a class="pull-right">123123</a>
                        </li>

                    </ul>

                    <a href="#" class="btn btn-primary btn-block">Send Mass Message</a>
                    <a href="#" class="btn btn-danger btn-block">Delete</a>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#users" data-toggle="tab">Users</a>
                    </li>
                    <li>
                        <a href="#permissions" data-toggle="tab">Permissions</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="users">
                        @include('permissions.parts.role_users')
                    </div>
                    <div class="tab-pane" id="permissions">
                        @include('permissions.parts.role_permissions')
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection