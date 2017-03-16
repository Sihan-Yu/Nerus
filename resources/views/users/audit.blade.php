@extends('layouts.app')

@include('layouts.parts.page_title', ['title' => __('profile.audit_trail'), 'description' => __('profile.audit_trail_description')])
@include('layouts.parts.breadcrumbs', ['breadcrumbs' => [0 => ['text' => __('profile.audit_trail'), 'icon' => 'fa fa-stack-overflow', 'route' => route('audit.trail'), 'active' => 1]]])

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">{{ __('profile.your_audit_trail') }}</h3>

                    <div class="box-tools">

                    </div>
                </div>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th>{{ __('profile.transaction_id') }}</th>
                            <th>{{ __('profile.creation_date') }}</th>
                            <th>{{ __('profile.audit_type') }}</th>
                        </tr>
                        @if (!$trails)
                            <tr>
                                <td colspan="3">{{ __('profile.') }}</td>

                            </tr>

                        @else
                            @foreach ($trails as $trail)
                            <tr>
                                <td>{{ $trail->id }}</td>
                                <td>{{ $trail->created_at }}</td>
                                <td>{{ $trail->auditable_type }}</td>
                            </tr>
                            @endforeach
                        @endif
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection