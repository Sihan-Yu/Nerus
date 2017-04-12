@extends('layouts.app')

@include('layouts.parts.page_title', ['title' => __('permissions.permissions'), 'description' => __('permissions.permissions_description')])
@include('layouts.parts.breadcrumbs', ['breadcrumbs' => [0 => ['text' => __('permissions.permissions'), 'icon' => 'fa fa-hand-paper-o', 'route' => route('permissions.index'), 'active' => 1]]])

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">{{ __('permissions.roles') }} (<b>{{ count($roles) }}</b>)</h3>
                        </div>
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <tr>
                                    <th>ID</th>
                                    <th>{{ __('profile.name') }}</th>
                                    <th>{{ __('permissions.role_description') }}</th>
                                </tr>
                                @foreach ($roles as $role)
                                    <tr>
                                        <td>{{ $role->id }}</td>
                                        <td>
                                            <a href="{{ route('role.index', $role->id) }}">{{ __('permissions.role_'.$role->name) }}</a>
                                        </td>
                                        <td>{{ __('permissions.role_'.$role->name.'_description') }}</td>
                                    </tr>
                                @endforeach
                                @permission('role:create')<tr>@include('permissions.parts.create_role')</tr>@endpermission
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="callout callout-info">
                        <h4>{{ __('permissions.reminder') }}</h4>

                        <p>{{ __('permissions.reminder_text') }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">{{ __('permissions.permissions') }} (<b>{{ count($permissions) }}</b>)</h3>
                        </div>

                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <tr>
                                    <th>ID</th>
                                    <th>{{ __('profile.name') }}</th>
                                    <th>{{ __('permissions.description') }}</th>
                                    <th></th>
                                </tr>
                                @foreach ($permissions as $permission)
                                    <tr>
                                        <td>{{ $permission->id }}</td>
                                        <td>{{ $permission->name }}</td>
                                        <td>{{ $permission->description }}</td>
                                        <td class="pull-right"><form action="{{ route('permissions.delete') }}" method="post">
                                                {{ csrf_field() }}
                                                <input type="text" hidden="hidden" name="permission_id" value="{{ $permission->id }}">
                                                <button type="submit" class="btn btn-xs btn-danger btn-flat"><i
                                                            class="fa fa-trash"></i></button>
                                            </form></td>
                                    </tr>
                                @endforeach
                                @permission('permission:create')<tr>@include('permissions.parts.create_permission')</tr>@endpermission
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection