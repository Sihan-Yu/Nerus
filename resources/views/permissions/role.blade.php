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
                            <b>{{ __('permissions.created_on') }}</b> <a class="pull-right">{{ $role->created_at }}</a>
                        </li>

                        <li class="list-group-item">
                            <b>{{ __('permissions.users_number') }}</b> <a class="pull-right">{{ count($users) }}</a>
                        </li>

                        <li class="list-group-item">
                            <b>{{ __('permissions.permission_number') }}</b> <a class="pull-right">{{ count($permissions) }}</a>
                        </li>

                    </ul>

                    @permission('mail:mass')<a href="#" class="btn btn-primary btn-block">{{ __('permissions.send_mass_mail') }}</a>@endpermission
                    @permission('role:delete')<a href="#" class="btn btn-danger btn-block">{{ __('permissions.delete') }}</a>@endpermission
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#users" data-toggle="tab">{{ __('permissions.users') }}</a>
                    </li>
                    <li>
                        <a href="#permissions" data-toggle="tab">{{ __('permissions.permissions') }}</a>
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