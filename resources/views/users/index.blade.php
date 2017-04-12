@extends('layouts.app')

@include('layouts.parts.page_title', ['title' => __('profile.users'), 'description' => __('profile.users_description')])
@include('layouts.parts.breadcrumbs', ['breadcrumbs' => [0 => ['text' => __('profile.users'), 'icon' => 'fa fa-user', 'route' => route('user.index'), 'active' => 1]]])

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">{{ __('profile.users') }}</h3>

                    <div class="box-tools">
                        <div class="input-group input-group-sm" style="width: 250px;">
                            <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th>ID</th>
                            <th>{{ __('profile.name') }}</th>
                            <th>{{ __('profile.creation_date') }}</th>
                            <th>{{ __('profile.activated') }}</th>
                            <th>{{ __('profile.roles') }}</th>
                        </tr>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td><a href="{{ route('user.view', $user->id) }}">{{ $user->name }}</a></td>
                                <td>{{ $user->created_at }}</td>
                                <td><span class="label label-success">Active</span></td>
                                <td>@foreach ($roles[$user->id] as $role)
                                        {{ $role }}
                                    @endforeach</td>
                            </tr>
                        @endforeach
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection