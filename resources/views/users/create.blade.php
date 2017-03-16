@extends('layouts.app')

@include('layouts.parts.page_title', ['title' => __('profile.create_user'), 'description' => __('profile.create_user_description')])
@include('layouts.parts.breadcrumbs', ['breadcrumbs' => [0 => ['text' => __('profile.users'), 'icon' => 'fa fa-user', 'route' => route('user.index'), 'active' => 0], 1 => ['text' => __('profile.create_user'), 'icon' => '', 'route' => route('user.create'), 'active' => 1]]])

@section('content')

    <div class="row">
        <div class="col-md-3">
            <div class="box">
                <div class="panel-heading">
                    <strong>
                        {{ __('profile.create_user') }}
                    </strong>
                </div>
                <div class="panel-body">
                    <form action="{{ route('user.store') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">

                            <div class="form-group has-feedback">
                                <input id="name" type="text" name="name" class="form-control"
                                       placeholder="{{ __('profile.name') }}"
                                       value="{{ old('name') }}" maxlength="20" minlength="2" required autofocus>
                                <span class="fa fa-user form-control-feedback"></span>
                            </div>

                            <div class="form-group has-feedback">
                                <input id="email" type="email" name="email" class="form-control"
                                       placeholder="{{ __('auth.email') }}"
                                       value="{{ old('email') }}" required>
                                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                            </div>

                            <input type="submit" class="btn btn-primary btn-flat form-control"
                                   name="submit"
                                   value="Submit">

                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">{{ __('profile.users') }}</h3>

                    <div class="box-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
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
                                <td>TODO</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>

    </div>

@endsection